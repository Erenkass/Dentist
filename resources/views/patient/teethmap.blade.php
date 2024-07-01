<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hasta Diş Haritası</title>
    <style>
        #svg2 {
            position: relative;
            left: 35%;
            background-color: #bababa;
            width: 500px;
            height: auto;
        }
        .tooth {
            fill: white;
        }
        .tooth:hover {
            fill: rgba(228, 234, 177, 0.984);
        }

        .processed {
            fill: rgba(255, 0, 0, 0.5);
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="container col-lg-10">
            <div class="content-area">
                <h1 align="center">Hasta Diş Haritası</h1>
                @include('svg.tooth')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
       window.addEventListener('pageshow',function (event){
           if(event.persisted){
               window.location.reload();
           }
       })
       window.addEventListener('load',display);
       function display(){
           const processedTeeth = @json($processedToothIds);
           Object.values(processedTeeth).forEach(toothId => {
               const toothElement = document.getElementById(toothId);
               console.log("element ",toothId);
               if (toothElement) {
                   toothElement.classList.add('processed');
               }
           })
       }


        document.getElementById('svg2').addEventListener('click', function(event) {
            const toothId = event.target.closest('.tooth').id;
            console.log(toothId);
            if (toothId) {
                const patientId = {{ $patient->id }};
                window.location.href = `/admin/hastalar/${patientId}/diş?tooth_id=${toothId}`;
            }
        });


    </script>
</body>

</html>
