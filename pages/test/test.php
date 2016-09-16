<!DOCTYPE html>
<html lang="en">
<head>
    <script src="jquery-1.8.3.min.js"></script>
</head>
<body>
    <div id="time"></div>
    <div id="nama"></div>

    <script>
        $(document).ready(function(){
            setInterval(function(){
                $.post('cek.php', {'ambil_data' : 'waktu'}).done(function(data){
                    $('#time').html(data);
                });
            }, 1000);

            setInterval(function(){
                $.post('cek.php', {'ambil_data' : 'nama'}).done(function(data){
                    $('#nama').html(data);
                });
            }, 1100);
        });
    </script>
</body>
</html>
