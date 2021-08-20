$( document ).ready(function() {

    // Detect website default language
    var default_language = "en";
    var locale = document.documentElement.lang===default_language ? "/" : "/"+document.documentElement.lang+"/";

    // Get last request date from local storage
    var request_date = localStorage.getItem('user_data');
    
    //  CHECK IF DATE VARIABLE EXISTS OR TIME INTERVAL LONG ENOUGH TO EXECUTE NEW REQUEST
    if( request_date === null || (parseFloat(request_date) + 1800) <  Math.floor(Date.now() / 1000)){
        localStorage.setItem('user_data',Math.floor(Date.now() / 1000).toString());
        makeRequests();
    } 

    function makeRequests() {
        // var ip = document.querySelector("meta[property='host_ip']").getAttribute("content");
        // var ip = '74.208.150.82';  VPN
        var ip = '185.139.137.157';
        var ip_params = null;
        var ua_params = null;

        // PARSE  USER  IP ADDRESS  WITH  OPEN  API
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function () {
            if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
                ip_params = xmlHttp.responseText;
            }
        };
        xmlHttp.open("GET", "https://vpnapi.io/api/" + ip + "?key=cb420f03576a405787a67acea3948582", true); // true for asynchronous
        xmlHttp.send(null);

        // PARSE  USER  AGENT  WITH  OPEN  API
        var myHeaders = new Headers();
        myHeaders.append("apikey", "HiSZilCgz6hBtkbKvtQeA0ZVARdSI6gs");
        var requestOptions = {
            method: 'GET',
            redirect: 'follow',
            headers: myHeaders
        };
        fetch("https://api.promptapi.com/user_agent/parse?ua=" + navigator.userAgent, requestOptions)
            .then(response => response.text())
            .then(result =>ua_params = result)
            .catch(error => console.log('error', error));


        // POST THE RECEIVED JSON DATA TO SERVER
        setTimeout(function() {
            $.ajax({
                url: locale + "site/janalytic",
                type: 'POST',
                data: {
                    ip_params: btoa(ip_params.toString()),
                    ua_params: btoa(ua_params.toString()),
                    screen_w: screen.width,
                    screen_h: screen.height
                },
                success: function (res) {
                    console.log(res);
                }
            });
        }, 4000);
    }
});