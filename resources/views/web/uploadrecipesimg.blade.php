@extends('web.layout')
@section('content')

<!-- MAIN CONTENT -->
<?php //print_r($result['products_images_id']);?>
<main class="main-content">
                <div class="container-fluid px-md-5">
                    <form name="updateMyRecipe" class="align-items-center form-validate" action="{{ URL::to('updatemyrecipeimg')}}" method="post"enctype="multipart/form-data" > 
					 {{csrf_field()}}
					 <input class="form-control" id="products_images_id" name="products_images_id" type="hidden" value="{{$result['products_images_id']}}">
                        <div class="row mb-5">
                            <div class="col-12">
                                <!-- UPLOAD RECIPE PHOTOGRAPH -->
                                <div class="contain_upload_pic" style="background-image:url({{asset('./images/media/2021/08/import-recipe.png')}});">
                                    
                                    <div class="upload-main-wrapper">
                                        <div class="upload-wrapper">
                                            <input type="file" id="upload-file" name="file" >
                                            <span class="file-upload-text">Upload your recipe potographs here</span>
                                            <div class="file-success-text"> <span>Successfully Uploaded</span></div>
                                        </div>
                                        <p id="file-upload-name"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END FIRST ROW -->
                        
                        <div class="row mt-5">
                            <div class="col-md-12 mx-auto upload_recipe_Wrapper">
                                <div class="form-row">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit Recipe</button>
                                    </div>
                                </div>
                              </div>
                            
                            
                        </div>
                        
                        
                    </form>
                </div>
                
            </main>
 @endsection
