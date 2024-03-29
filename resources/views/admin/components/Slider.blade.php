@extends('admin.Layouts.app')
@section('title', 'Slider')
@php
$usr = Auth::guard('admin')->user();
@endphp
@section('content')
<div class="row mt-5">
    <div class="col-md-10 offset-md-1 border border-dark">
        <div id="mainDivSlider" class="container-fluid d-none">
            <div class="row">
                <div class="col-md-12 p-2">
                    <button id="addbtnSlider" class="btn btn-sm btn-danger my-3">Add New</button>
                    <table id="SliderDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Sl.</th>
                                <th class="th-sm">Image</th>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">Description</th>
                                <th class="th-sm EditIcon">Edit</th>
                                <th class="th-sm DeleteIcon">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="Slider_table">


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="loadDivSlider" class="container">
            <div class="row">
                <div class="col-md-12 p-5 text-center">
                    <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">

                </div>
            </div>
        </div>
        <div id="wrongDivSlider" class="container d-none">
            <div class="row">
                <div class="col-md-12 p-5 text-center">
                    <h3>Something Went Wrong!</h3>
                </div>
            </div>
        </div>



        <!-- Slider add -->
        <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form action="{{ route('admin.addslider') }}" method="post" id="sliderAddForm">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title ml-5">Add New Slider</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body  text-center">
                            <div class="container">
                                <div class="row">

                                    <input id="SliderName" type="text" id="" class="form-control mb-3"
                                        placeholder="Slider Name">
                                    <input id="SliderDes" type="text" id="" class="form-control mb-3"
                                        placeholder="Slider Description">
                                    <input required type="file" id="Sliderimg" class="form-control mb-3" name="text-input">
                                    <img  id="addimagepreview" style="height: 100px !important;" class="imgPreview mt-3 "
                                        src="{{ asset('admin/images/default-image.png') }}" />


                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                            <button id="SliderAddConfirmBtn" type="submit"
                                class="btn  btn-sm  btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Slider add -->

        <!-- Modal Slider Delete -->
        <div class="modal fade" id="deleteModalSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body p-3 text-center">
                        <h5 class="mt-4">Do you want to Delete</h5>
                        <h5 id="SliderDeleteId" class="mt-4 d-none "></h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                        <button data-id="" id="confirmDeleteSlider" type="button"
                            class="btn btn-sm btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Slider Delete -->




        <!-- Slider update -->
        <div class="modal fade" id="updateSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form action="{{route('admin.sliderupdate')}}" method="post" id="sliderUpdateForm">
                    @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Slider</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body  text-center">
                        <div id="SliderEditForm" class="container d-none ">
                            <h5 id="SliderEditId" class="mt-4 d-none"></h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <input id="SliderNameIdUpdate" type="text" id="" class="form-control mb-3"
                                        placeholder="Slider Name">
                                    <input id="SliderDesIdUpdate" type="text" id="" class="form-control mb-3"
                                        placeholder="Slider Description">

                                </div>
                                <div class="col-md-6">

                                    <input class="form-control" id="SliderimgUpdate" type="file">
                                    <img id="imagepreview" style="height: 100px !important;" class="imgPreview mt-3 "
                                        src="" />
                                </div>
                            </div>
                        </div>
                        <img id="SliderLoader" class="loding-icon m-5 d-none" src="{{ asset('loader.svg') }}" alt="">
                        <h3 id="SliderwrongLoader" class="d-none">Something Went Wrong!</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                        <button id="SliderupdateConfirmBtn" type="submit"
                            class="btn  btn-sm  btn-primary">Update</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>


<!-- Slider update -->



@endsection
@section('script')
<script type="text/javascript">
    getSliderdata();

    function getSliderdata() {
        axios.get("{{ route('admin.getsliderdata') }}")
            .then(function(response) {
                if (response.status = 200) {
                    $('#mainDivSlider').removeClass('d-none');
                    $('#loadDivSlider').addClass('d-none');
                    $('#SliderDataTable').DataTable().destroy();
                    $('#Slider_table').empty();
                    var count = 1;
                    var dataJSON = response.data;

                    $.each(dataJSON, function(i, item) {
                        $('<tr>').html(
                            "<td>" + count++ + " </td>" +
                            "<td><img width='200px' height='80' class='table-img' src=" + dataJSON[i]
                            .image + "> </td>" +
                            "<td>" + dataJSON[i].title + " </td>" +
                            "<td>" + dataJSON[i].sub_title + " </td>" +
                            "<td><a class='SliderEditIcon' data-id=" + dataJSON[i].id +
                            "><i class='fas fa-edit'></i></a> </td>" +
                            "<td><a class='SliderDeleteIcon' data-id=" + dataJSON[i].id +
                            " ><i class='fas fa-trash-alt'></i></a> </td>"
                        ).appendTo('#Slider_table');
                    });

                    @if (!$usr->can('product.delete') )
                    $('.DeleteIcon').empty();
                    $('.SliderDeleteIcon').hide();
                    @endif
                    @if (!$usr->can('blog.edit'))
                        $('.EditIcon').empty();
                        $('.SliderEditIcon').empty();
                    @endif
                    @if (!$usr->can('blog.create'))
                        $('#addbtnSlider').empty();
                    @endif



                    //Slider click on delete icon
                    $(".SliderDeleteIcon").click(function() {
                        var id = $(this).data('id');
                        $('#SliderDeleteId').html(id);
                        $('#deleteModalSlider').modal('show');
                    })
                    //Slider edit icon click
                    $(".SliderEditIcon").click(function() {
                        var id = $(this).data('id');
                        $('#SliderEditId').html(id);
                        $('#updateSliderModal').modal('show');
                        SliderUpdateDetails(id);
                    })
                    $('#SliderDataTable').DataTable({
                        "order": false
                    });
                    $('.dataTables_length').addClass('bs-select');
                } else {
                    $('#wrongDivSlider').removeClass('d-none');
                    $('#loadDivSlider').addClass('d-none');
                }
            }).catch(function(error) {
                $('#wrongDivSlider').removeClass('d-none');
                $('#loadDivSlider').addClass('d-none');
            });
    }
    //add button modal show for add new entity
    $('#addbtnSlider').click(function() {
        $('#addSliderModal').modal('show');
    });


    //Slider Add modal save button
    $('#sliderAddForm').submit(function(event) {
        event.preventDefault();
        var name = $('#SliderName').val();
        var des = $('#SliderDes').val();
        var img = $('#Sliderimg').prop('files')[0];
        SliderAdd(name, des, img);
    })
    $('#Sliderimg').change(function() {
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(event) {
            var ImgSource = event.target.result;
            $('#addimagepreview').attr('src', ImgSource)
        }
    })
    //slider Add Method
    function SliderAdd(name, des, img) {

        $('#SliderAddConfirmBtn').html(
            "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
        my_data = [{
            name: name,
            description: des
        }];
        var formData = new FormData();
        formData.append('data', JSON.stringify(my_data));
        formData.append('photo', img);
        axios.post("{{ route('admin.addslider') }}", formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(function(response) {
            $('#SliderAddConfirmBtn').html("Save");
            if (response.status = 200) {
                if (response.data == 1) {
                    $('#addSliderModal').modal('hide');
                    toastr.success('Add New Success .', 'Success', {
                        closeButton: true,
                        progressBar: true,
                    });
                    $('#SliderName').val("");
                    $('#SliderDes').val("");
                    $('#Sliderimg').val("");
                    document.getElementById("addimagepreview").src = window.location.protocol + "//" +
                        window.document.location.host + "/public/admin/images/default-image.png";
                    getSliderdata();
                } else {
                    $('#addSliderModal').modal('hide');
                    toastr.error('Add New Failed', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                    getSliderdata();
                }
            } else {
                $('#addSliderModal').modal('hide');
                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });
            }
        }).catch(function(error) {
            $('#addSliderModal').modal('hide');
            toastr.error('Something Went Wrong', 'Error', {
                closeButton: true,
                progressBar: true,
            });
        });

    }
    //each Slider  Details data show for edit
    function SliderUpdateDetails(id) {
        axios.post("{{ route('admin.sliderdetails') }}", {
                id: id
            })
            .then(function(response) {
                if (response.status == 200) {
                    $('#SliderLoader').addClass('d-none');
                    $('#SliderEditForm').removeClass('d-none');
                    var jsonData = response.data;
                    $('#SliderNameIdUpdate').val(jsonData[0].title);
                    $('#SliderDesIdUpdate').val(jsonData[0].sub_title);
                    var ImgSource = (jsonData[0].image);
                    $('#imagepreview').attr('src', ImgSource)
                } else {
                    $('#SliderLoader').addClass('d-none');
                    $('#SliderwrongLoader').removeClass('d-none');
                }
            }).catch(function(error) {
                $('#SliderLoader').addClass('d-none');
                $('#SliderwrongLoader').removeClass('d-none');
            });
    }
    $('#SliderimgUpdate').change(function() {
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(event) {
            var ImgSource = event.target.result;
            $('#imagepreview').attr('src', ImgSource)
        }
    })
    //Slider update modal save button
    $('#sliderUpdateForm').submit(function(event) {
        event.preventDefault();
        var idUpdate = $('#SliderEditId').html();
        var nameUpdate = $('#SliderNameIdUpdate').val();
        var desUpdate = $('#SliderDesIdUpdate').val();
        var img = $('#SliderimgUpdate').prop('files')[0];
        SliderUpdate(idUpdate, nameUpdate, desUpdate, img);
    })
    //update Slider data using modal
    function SliderUpdate(idUpdate, nameUpdate, desUpdate, imgUpdate) {

        $('#SliderupdateConfirmBtn').html(
            "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
        updateData = [{
            id: idUpdate,
            name: nameUpdate,
            description: desUpdate
        }];
        var formData = new FormData();
        formData.append('data', JSON.stringify(updateData));
        formData.append('photo', imgUpdate);
        axios.post("{{ route('admin.sliderupdate') }}", formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(function(response) {
            $('#SliderupdateConfirmBtn').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    $('#updateSliderModal').modal('hide');
                    toastr.success('Update Success.', 'Success', {
                        closeButton: true,
                        progressBar: true,
                    });
                    getSliderdata();
                } else {
                    $('#updateSliderModal').modal('hide');
                    toastr.error('Update Failed', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    })
                    getSliderdata();
                }
            } else {
                $('#updateSliderModal').modal('hide');
                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });
            }
        }).catch(function(error) {
            $('#updateSliderModal').modal('hide');
            toastr.error('Something Went Wrong', 'Error', {
                closeButton: true,
                progressBar: true,
            });
        });

    }
    //  slider delete modal yes button
    $('#confirmDeleteSlider').click(function() {
        var id = $('#SliderDeleteId').html();
        // var id = $(this).data('id');
        DeleteDataSlider(id);
    })
    //delete Slider function
    function DeleteDataSlider(id) {
        $('#confirmDeleteSlider').html(
            "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
        axios.post("{{ route('admin.sliderdelete') }}", {
                id: id
            })
            .then(function(response) {
                $('#confirmDeleteSlider').html("Yes");
                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#deleteModalSlider').modal('hide');
                        toastr.warning('Delete Success.', 'Success', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getSliderdata();
                    } else {
                        $('#deleteModalSlider').modal('hide');
                        toastr.error('Delete Failed', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getSliderdata();
                    }
                } else {
                    $('#deleteModalSlider').modal('hide');
                    toastr.error('Something Went Wrong', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                }
            }).catch(function(error) {
                $('#deleteModalSlider').modal('hide');
                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });
            });
    }
</script>

@endsection
