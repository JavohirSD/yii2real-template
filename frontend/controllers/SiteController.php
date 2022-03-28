<?php
namespace frontend\controllers;

use backend\models\Visitors;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use lubosdz\captchaExtended\CaptchaExtendedAction;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
          //  yiiCaptcha action
          //  'captcha' => [
          //      'class' => 'yii\captcha\CaptchaAction',
          //      'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
          //  ],
            'captcha' => [
                'class' => 'lubosdz\captchaExtended\CaptchaExtendedAction',
                'mode' => 'math',
                'resultMultiplier' => 4,
                'lines' => 2,
                'density' => 2,
                'fillSections' => 2,
                'height' => 40,
                'width' => 80,
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
       
 
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
        	print_r(Yii::$app->request->post()); exit;
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestpasswordreset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionJanalytic(){
        if(Yii::$app->request->isAjax) {
            $ip_params = json_decode(base64_decode(Yii::$app->request->post()['ip_params']), true);
            $ua_params = json_decode(base64_decode(Yii::$app->request->post()['ua_params']), true);

            $visitor = Visitors::findOne(['ip_address' => $ip_params['ip']]);

            if ($visitor) {
                $visitor->last_seen = date('Y-m-d H:i:s');
                $visitor->visits    = ($visitor->visits + 1);
            } else {
                $visitor = new Visitors();
                $visitor->ip_address = $ip_params['ip'];
                $visitor->vpn   = $ip_params['vpn'];
                $visitor->proxy = $ip_params['proxy'];
                $visitor->tor   = $ip_params['tor'];
                $visitor->latitude  = $ip_params['location']['latitude'];
                $visitor->longitude = $ip_params['location']['longitude'];
                $visitor->city      = $ip_params['location']['city'];
                $visitor->country   = $ip_params['location']['country'];
                $visitor->region    = $ip_params['location']['region'];
                $visitor->continent = $ip_params['location']['continent'];
                $visitor->time_zone = $ip_params['location']['time_zone'];
                $visitor->country_code = $ip_params['location']['country_code'];
                $visitor->organisation = $ip_params['network']['autonomous_system_organization'];
                $visitor->user_agent   = $ua_params['ua'];
                $visitor->browser      = $ua_params['browser']['name'] . ', ' . $ua_params['browser']['version_major'] . "(" . $ua_params['browser']['version'] . ")";
                $visitor->operation_system = $ua_params['os']['name'] . " " . $ua_params['os']['version_major'] . " (" . $ua_params['os']['version'] . ")";
                $visitor->screen = Yii::$app->request->post()['screen_w'] . 'x' . Yii::$app->request->post()['screen_h'];
                $visitor->status = 1;
                $visitor->visits = 0;

                if ($ua_params['type']['mobile']) {
                    $device = 'Mobile';
                }
                if ($ua_params['type']['tablet']) {
                    $device = 'Tablet';
                }
                if ($ua_params['type']['touch_capable']) {
                    $device = 'Touch_Capable';
                }
                if ($ua_params['type']['pc']) {
                    $device = 'PC';
                }
                $visitor->device = "(" . $device . ") " . $ua_params['device']['name'] . '/ ' . $ua_params['device']['brand'] . '/ ' . $ua_params['device']['model'];

//            $a = json_decode(base64_decode(Yii::$app->request->post()['ua_params']),true)['ua'];
//            $b = json_decode(base64_decode(Yii::$app->request->post()['ua_params']),true)['type']['pc'];
//            $c = json_decode(base64_decode(Yii::$app->request->post()['ua_params']),true)['browser']['version'];
//            file_put_contents("00.txt", $a.'<--->'.$b.'<--->'.$c,true);
//            file_put_contents("01.txt",print_r(base64_decode(Yii::$app->request->post()['ip_params']),true));
//            file_put_contents("02.txt",print_r(base64_decode(Yii::$app->request->post()['ua_params']),true));

            }
            if ($visitor->save())
                return 'success!';
            else
                return print_r($visitor->getErrors());
        }
    }

    public function printMeta($title, $image, $description , $url, $site_name)
    {
        \Yii::$app->view->registerMetaTag([
            'name' => 'twitter:image',
            'content'  => $image
        ]);

        \Yii::$app->view->registerMetaTag([
            'name' => 'twitter:card',
            'content'  => 'summary_large_image'
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => 'og:title',
            'content'  => $title
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => 'og:image',
            'content'  => $image
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => 'og:description',
            'content'  => $description
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => 'og:url',
            'content'  => $url
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => 'og:site_name',
            'content'  => $site_name
        ]);
    }





}
