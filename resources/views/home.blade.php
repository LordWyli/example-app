<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IoT</title>
</head>
<body>
    <h1>WebSockets Test</h1>
    <div class="app">

    </div>
    @vite('./resources/js/app.js')
    <script>
        setTimeout(() => {
            window.Echo.channel('sensorMovimiento')
            .listen('.App\\Events\\SensorMovimientosEvent', (e)=>{
                console.log(e);
            });
        }, 200);
    </script>
</body>
</html>
