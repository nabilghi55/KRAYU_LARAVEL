@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Edit Product</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
                <form action="{{ route('products.update', $product->id)  }}" method="POST" name="productForm" id="productForm" enctype="multipart/form-data">
                @csrf
					<div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ $product->title }}">
                                                    <p class="error"></p>
                                                </div>
                                            </div>
                                             <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="slug">Slug</label>
                                                    <input type="text" readonly name="slug" id="slug" class="form-control" placeholder="Slug" value="{{ $product->slug }}">
                                                    <p class="error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="description">Short Description</label>
                                                    <textarea name="short_description" id="short_description" cols="30" rows="10" class="summernote"
                                                    placeholder="">{{ $product->short_description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" cols="30" rows="10" class="summernote"
                                                    placeholder="Description">{{ $product->description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="description"> Shipping and Returns</label>
                                                    <textarea name="shipping_returns" id="shipping_returns" cols="30" rows="10" class="summernote"
                                                    placeholder="Description">{{ $product->shipping_returns }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <label for="inputProductTitle" class="h5 mb-3">Media</label>
                                        <div class="text-secondary">
                                            <input name="product_image" class="form-control" type="file" id="product_image" />
                                            @error('product_image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="product-gallery">
                                        <div class="col-md-3" id="">
                                            <div class="card">
                                                <img src="{{ $product->product_image }}" class="card-img-top" alt="">
                                            </div>
                                        </div>
                                </div>
                                <div class="card" id="product-gallery">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="text-secondary">
                                                <img id="showImage" alt="profile_preview" class="img-thumbnail shadow-sm" width="110">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Pricing</h2>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="price">Price</label>
                                                    <input type="text" name="price" id="price" class="form-control" placeholder="Price" value="{{ $product->price }}">
                                                    <p class="error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="compare_price">Compare at Price</label>
                                                    <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price"
                                                    value="{{ $product->compare_price }}">
                                                    <p class="text-muted mt-3">
                                                        To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Inventory</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="sku">SKU (Stock Keeping Unit)</label>
                                                    <input type="text" name="sku" id="sku" class="form-control" placeholder="sku" value="{{ $product->sku }}">
                                                    <p class="error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="barcode">Barcode</label>
                                                    <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode" value="{{ $product->barcode }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="hidden" name="track_qty" value="No">
                                                        <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty"
                                                        value="Yes" {{ ($product->track_qty == 'Yes') ? 'checked' : ''}}>
                                                        <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                                        <p class="error"></p>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty" value="{{ $product->qty }}">
                                                    <p class="error"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Related Products</h2>
                                            <div class="mb-3">
                                                <select multiple class="related-product w-100" name="related_products[]" id="related_products">
                                                    @if (!empty($relatedProducts))
                                                        @foreach ($relatedProducts as $relProduct)
                                                            <option selected value="{{ $relProduct->id }}">{{ $relProduct->title }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <p class="error"></p>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Product status</h2>
                                        <div class="mb-3">
                                            <select name="status" id="status" class="form-control">
                                                <option {{ ($product->status == 1) ? 'selected' : '' }} value="1">Active</option>
                                                <option {{ ($product->status == 0) ? 'selected' : '' }} value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Featured product</h2>
                                        <div class="mb-3">
                                            <select name="is_featured" id="is_featured" class="form-control">
                                                <option {{ ($product->is_featured == 'No') ? 'selected' : ''}} value="No">No</option>
                                                <option {{ ($product->is_featured == 'Yes') ? 'selected' : ''}} value="Yes">Yes</option>
                                            </select>
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
					</div>
                </form>
					<!-- /.card -->
				</section>
				<!-- /.content -->
@endsection

@section('customJs')
<script>
     $(document).ready(function() {
            $('#product_image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    $('.related-product').select2({
    ajax: {
        url: '{{ route("products.getProducts") }}',
        dataType: 'json',
        tags: true,
        multiple: true,
        minimumInputLength: 3,
        processResults: function (data) {
            return {
                results: data.tags
            };
        }
    }
});

    $('#title').change(function(){
	element = $(this);
	$("button[type=submit]").prop('disabled',true);
	$.ajax({
		url: '{{ route("getSlug") }}',
		type: 'get',
		data: {title: element.val()},
		dataType: 'json',
		success: function(response){
			$("button[type=submit]").prop('disabled',false);
				if(response["status"] == true) {
					$("#slug").val(response["slug"]);
				}
			}
		});
});

    $("#productForm").submit(function(event){
        event.preventDefault();
        var formArray = $(this).serializeArray();
        $("button[type='submit']").prop('disabled', true);

        $.ajax({
            url:'{{ route("products.update",$product->id) }}',
            type:'put',
            data: formArray,
            dataType: 'json',
            success: function(response){
                $("button[type='submit']").prop('disabled', false);

                if(response['status'] == true){
                    $(".error").removeClass('invalid-feedback').html('');
                    $("input[type='text'], select, input[type='number']").removeClass('is-invalid');

                    window.location.href="{{ route('products.index') }}";
                }else{
                    var errors = response['errors'];

                    // if(errors['title']){
                    //     $("#title").addClass('is-invalid')
                    //     .siblings('p')
                    //     .addClass('invalid-feedback')
                    //     .html(errors['title']);
                    // } else {
                    //     $("#title").removeClass('is-invalid')
                    //     .siblings('p')
                    //     .removeClass('invalid-feedback')
                    //     .html("");

                    // }

                    $(".error").removeClass('invalid-feedback').html('');
                    $("input[type='text'], select, input[type='number']").removeClass('is-invalid');

                    $.each(errors, function(key,value){
                        $(`#${key}`).addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(value);
                    });

                }
            },
            error: function(){
                console.log("Something went wrong")
            }
        });
    });

    $("#category").change(function(){
        var category_id = $(this).val();
        $.ajax({
            url:'{{ route("product-subcategories.index") }}',
            type:'get',
            data: {category_id:category_id},
            dataType: 'json',
            success:function(response){
                //console.log(resposnse)

                $("#sub_category").find("option").not(":first").remove();
                $.each(response["subCategories"],function(key,item){
                    $("#sub_category").append(`<option value="${item.id}">${item.name}</option>`);
                });
            },
            error: function(){
                console.log("Something went wrong");
            }
        });
    });

    Dropzone.autoDiscover = false;
	const dropzone = $("#image").dropzone({

		url:  "{{ route('product-images.update') }}",
		maxFiles: 10,
		paramName: 'image',
        params: {'product_id': '{{ $product->id }}'},
		addRemoveLinks: true,
		acceptedFiles: "image/jpeg,image/png,image/gif",
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
        success: function(file, response){
			$("#image_id").val(response.image_id);
			//console.log(response)


        var html = `<div class="col-md-3" id="image-row-${response.image_id}"><div class="card">
            <input type="hidden" name="image_array[]" value="${response.image_id}">
            <img src="${response.ImagePath}" class="card-img-top" alt="...">
            <div class="card-body">
                <a href="javascript:void(0)" onclick="deleteImage(${response.image_id})" class="btn btn-danger">Delete</a>
            </div>
        </div></div>`;

        $("#product-gallery").append(html);
		},
        complete: function(file){
            this.removeFile(file);
        }
	});

function deleteImage(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("product-images.destroy") }}',
                type: 'DELETE',
                data: { id: id },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.status == true) {
                        Swal.fire(
                            'Deleted!',
                            'Image has been deleted.',
                            'success'
                        ).then(() => {
                            $("#image-row-" + id).remove();
                        });
                    } else {
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the image.',
                            'error'
                        );
                    }
                },
                error: function () {
                    Swal.fire(
                        'Error!',
                        'An error occurred while deleting the image.',
                        'error'
                    );
                }
            });
        }
    });
}

</script>
@endsection
