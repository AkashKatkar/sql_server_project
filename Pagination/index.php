<html>
    <head>
        <title>Pagination</title>
        <style>
            :root {
                --rad: .7rem;
                --dur: .3s;
                --color-dark: #2f2f2f;
                --color-light: #fff;
                --font-fam: 'Lato', sans-serif;
                --height: 2.2rem;
                --bez: cubic-bezier(0, 0, 0.43, 1.49);
            }

            .search_div {
                position: relative;
                width: 15rem;
                border-radius: var(--rad);
                border: 1.5px solid #414042;
            }
            input, button {
                height: var(--height);
                font-family: var(--font-fam);
                border: 0;
                color: var(--color-dark);
                font-size: 1rem;
            }
            input[type="search"] {
                outline: 0; 
                width: 100%;
                background: var(--color-light);
                padding: 0 0.8rem;
                border-radius: var(--rad);
                appearance: none;
                transition: all var(--dur) var(--bez);
                transition-property: width, border-radius;
                z-index: 1;
                position: relative;
            }
            label {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
                padding: 0;
                border: 0;
                height: 1px;
                width: 1px;
                overflow: hidden;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="search_div m-2">
                        <input id="search" type="search" placeholder="Search..." />  
                    </div>
                </div>
                <table class="table mt-1">
                    <thead class="table-dark">
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Salary</td>
                            <td>Gender</td>
                        </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <nav>
                        <ul class="pagination" id="pagination_"></ul>
                    </nav>
                </div>
            </div>
        </div>

        <script>
            var rows = 2;
            function pagination(page){
                jQuery.ajax({
                    url: 'pagination.php',
                    type: 'POST',
                    data: {'rows': rows, 'page': page},
                    success: function(data){
                        // document.write(data);
                        let arr_data = JSON.parse(data);
                        $("#tbody").html(arr_data[0]);
                        $("#pagination_").html(arr_data[1]);
                    }
                });
            }
            pagination(1);
        </script>
    </body>
</html>