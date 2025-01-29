        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
        <!-- asset plugin data tables -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>
        <!-- end asset plugin data tables -->

        <!-- load fontawesome with cdn -->
        <!-- <script src="https://cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script> -->
        <script>
                CKEDITOR.replace( 'alamat',{
                        filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
                        filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                        height: '400px'

                    }
                );
        </script>

        <script>
            $(document).ready(function(){
                $('#table').DataTable();
            })
        </script>
    </body>
</html>