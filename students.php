<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax crud 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Created form -->
                <form id="saveStudent">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter full name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email address">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter contact number">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Course</label>
                            <input type="text" class="form-control" name="course" placeholder="Enter course name">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

                <!-- End of the form -->

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>PHP Ajax crud without page reload using bootstrap Modal

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentAddModal">
                                Add Student
                            </button>
                            <a href=""></a>
                        </h4>
                    </div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>


    <!-- bootstrap bundle with popper-->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" ></script>

    <script>
        //Create a student      
        $(document).on('submit', '#saveStudent', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_student", true);

            $.ajax({
                type: 'POST',
                url: 'code.php',
                data: 'formData',
                processData: false,
                contentType: false,
                success: function (response) {

                    // You can use jQuery also
                    var res = $.parseJSON(response);
                    if(res.status == 422) {

                        $("#errorMessage").removeClass('d-none');
                        $("#errorMessage").text(res.message);
                        
                    }
                    
                },

            })
        });
    </script>
</body>

</html>
