@extends('layouts.app')

@section('content')
    <!-- Bootstrap Boilerplate... --> 
    <div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Single sample acquisition</h1>
            </div>

    <div class="panel-body">
        An easy to use acquisition system based on Derek Molloy's ADC example.
        <br><br>
        Follow the next steps to aquire a 6 seconds sample with 2 KHz sampling frequency
        <br><br>
        <!-- Display Validation Errors -->


        <!--1st Step in Acquisition process-->
        <h2>First Step. Configuration</h2>
        <br>
        The first step consist in the BeagleBone configuration.
        <ul><br>
            <li>Loading the PRU-ADC overlay to the device tree overlay of the beaglebone</li>
            <li>Setting the RAM pool for the acquired sample</li>
        </ul>
        
        <!--2nd Step in Acquisition process-->
        <h2>Second Step. RAM pool configuration</h2>
        <br>
        The second step consist on setting the RAM pool for the acquired data.
        <ul><br>
            <li>Setting up uio_pruss to 0x4E20 or 20,000 samples</li>
        </ul>
        
        <!--3rd Step in Acquisition process-->
        <h2>Third Step. Sampling the data</h2>
        <br>
        Once the BB is configurated, the acquisition process can be started. Execute the third step to take the samples, make shure the cape is well positioned.
        <br>

        <!--3rd Step in Acquisition process-->
        <h2>Fourth step. Export sampled data</h2>
        <br>
        If the data acquisition process was succesfully completed, you can retrieve the sampled data in a .dat file by clicking the export data button.
        <br>
    </div>
    </div>
    </div>
    </div>

        <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Execute the steps on the beaglebone</h1>
            </div>
        <br>
        <!-- Execute 1st Step-->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label" >BB Configuration</label>
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary" onclick="buttonExecuteClicked('bash ConfBB')">
                    <i class="fa aria-hidden="true""></i>  Execute
                </button>
            </div>
        </div>
        <br>
        <br>
        <!-- Execute 2nd Step Label-->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label" >Configure RAM pool</label>
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary" onclick="buttonExecuteClicked('bash ConfRAM')">
                    <i class="fa aria-hidden="true""></i>  Execute
                </button>
            </div>
        </div>
        <br>
        <br>
        <!-- Execute 3rd Step Label-->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label" >Data acquisition </label>
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-danger" onclick="buttonExecuteClicked('bash Run')">
                    <i class="fa fa-rocket aria-hidden="true""></i>   Run
                </button>
            </div>
        </div>
        <br>
        <br>
        <!-- Execute 4rd Step Label-->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label" >Generate the .cvs file </label>
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-success" onclick="buttonExecuteClicked('bash Export')">
                    <i class="fa aria-hidden="true""></i>  Export data
                </button>
            </div>
        </div>
        <br>
        <div class="form-group">
            <br><br>
            <pre id="labelCommandID"> No se ha ejecutado el comando</pre>
        </div>
            <p style="text-align:center;" class="lead">Click the link to download the file</p>
            <p style="text-align:center;">
                <a href="/download" class="btn btn-large"> Download File </a>
            </p>
    </div>
    </div>
    </div>

    <script type="text/javascript">

        function commandExecuted(resultText) {
            console.log(resultText);
            // document.getElementById('labelCommandID').innerHTML = resultText;
            $('#labelCommandID').html(resultText);
        }

        function buttonExecuteClicked(command) {
            $('#labelCommandID').html("Loading...");
            command = encodeURI(command);
            sendAsyncGetRequest('/command/' + command, commandExecuted);
        }

        function sendAsyncGetRequest(requestString,doOnDone)
        {
            var xmlhttp;
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    doOnDone(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET",requestString,true);
            xmlhttp.send();
        }
    </script>

@endsection
