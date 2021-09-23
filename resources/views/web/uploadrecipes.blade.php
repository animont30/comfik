@extends('web.layout')
@section('content')

<!-- MAIN CONTENT -->
<main class="main-content">
                <div class="container-fluid px-md-5">
                    <form name="updateMyRecipe" class="align-items-center form-validate" enctype="multipart/form-data" action="{{ URL::to('updateMyRecipe')}}" method="post">
                        <div class="row mb-5">
                            <div class="col-12">
                                <!-- UPLOAD RECIPE PHOTOGRAPH -->
                                <div class="contain_upload_pic" style="background-image:url({{asset('./images/media/2021/08/import-recipe.png')}});">
                                    
                                    <div class="upload-main-wrapper">
                                        <div class="upload-wrapper">
                                            <input type="file" id="upload-file">
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
                            <div class="col-md-9 mx-auto upload_recipe_Wrapper">
                                <!-- upload recipe form -->
                                <div class="form-group">
                                    <label for="select-category">Food Type</label>
                                    <select class="form-control" id="select-category">
                                        <option selected value="">-- Select Category --</option>
                                        @foreach($result['manufacturers'] as $m)
										<option  value="{{$m->manufacturers_id}}">{{$m->manufacturer_name}}</option>
										@endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="niche-title">Provide a nice title for your recipe</label>
                                    <input type="text" class="form-control" id="niche-title">
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6 pr-lg-4">
                                        <label for="servingFor">Serving For</label>
                                        <select class="form-control" id="select-category">
                                            <option selected value="">-- Select Serving --</option>
                                           @foreach($result['categories'] as $m)
												<option  value="{{$m->categories_id}}">{{$m->categories_name}}</option>
											@endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-3 pl-lg-4">
                                        <label for="quantity">Quantity</label>
                                        <select class="form-control" id="select-category">
                                            <option selected value="">-- Select Quantity --</option>
                                            <option>500 G</option>
                                            <option>1 Kg</option>
                                            <option>2 Kg</option>
                                            <option>None</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-row align-items-center want_to_sell_wrap mb-4">
                                    <div class="form-group col-md-2 decre-mt">
                                        <div class="custom-control pr-lg-4">
                                            <label class="d-block mb-0 mt-1">Want to Sell?</label>
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="switch_toggle"></span>
                                            </label>
                                        </div>  
                                    </div>
                                    <div class="form-group col-md-7 recipe-sell-options decre-mt">
                                        <label class="d-block">Time to prepare and deliver the order </label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="6hour" name="customRadioInline1" class="custom-control-input">
                                            <label class="custom-control-label ml-3" for="6hour">6 Hours</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline ml-3">
                                            <input type="radio" id="8hour" name="customRadioInline1" class="custom-control-input">
                                            <label class="custom-control-label ml-3" for="12hour">12 Hours</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline ml-3">
                                            <input type="radio" id="12hour" name="customRadioInline1" class="custom-control-input">
                                            <label class="custom-control-label ml-3" for="24hour">24 Hours</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 recipe-sell-options">
                                        <label for="setprice">Set a price for this item</label>
                                        <input type="text" class="form-control" placeholder="₹" id="setprice" required>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Ingredients</label>
                                        <textarea name="ingredients" class="form-control" id="" cols="100%" rows="5"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Recipe</label>
                                        <textarea name="Recipes" id="" class="form-control" cols="100%" rows="10"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="videourl">Video URL</label>
                                        <input type="url" class="form-control" id="videourl">
                                    </div>
                                </div>
                                
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
