<?php if(isset($_GET['test'])): ?>
<?php sleep(5); ?>
    <div>this is some test text </div>
<?php else: ?>

    <iframe id="iframe" src=""  hasData="false" name="iframe" ></iframe>
    <button id="button" >submit</button>
    <form id="form" visibility="hidden" method="POST">
        <input name="name" value="value" type="hidden"/>
    </form>
    <script>
        document.onreadystatechange = function () {
            switch (document.readyState) {
                case "interactive":
                    document.getElementById("button").addEventListener("click", function(){
                        document.getElementById("iframe").setAttribute('src','http://testdir?test');
                        document.getElementById('form').setAttribute('target', 'iframe');
                        document.getElementById('form').setAttribute('action', 'http://testdir?test');
                        document.getElementById('form').submit();
                        document.getElementById("iframe").setAttribute('hasData', 'false');
                        document.getElementById("iframe").setAttribute('onload', "document.getElementById('iframe').setAttribute('hasData', 'true')");

                        var intervalid = setInterval(function(){
                            if(document.getElementById('iframe').getAttribute('hasData') === 'true'){
                                clearInterval(intervalid);
                                console.log('success');
                                //do something when the response is received like a window.location or window.reload
                            }else{
                               
                            }
                        },700);
                        
                    });
                    break;
                case "complete":
                    var iframe = document.getElementById('iframe');
                    iframe.setAttribute('hasData', 'false');
                    break;
                }
        }

    </script>
        
<?php endif; ?>
