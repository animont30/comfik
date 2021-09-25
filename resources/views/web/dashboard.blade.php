@extends('web.layout')
@section('content')
<?php //print_r($result['author'])?>
<!-- MAIN CONTENT -->
<main class="main-content">
        <div class="author-banner-contain">
            <img src="{{asset('./images/media/2021/08/banner.jpg')}}" alt="banner image">
        </div>

        <!-- ABOUT AUTHOR -->
        <div class="container-fluid about_author_main_wrapper px-lg-5 mb-5">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="author_pic ml-md-4">
                                <img src="{{asset('./images/media/2021/08/user-2.jpg')}}" alt="Author Image">
                            </div>
                            <div class="author_social_handles mt-4 mb-2">
                                <ul class="d-flex align-items-center justify-content-center list-unstyled">
                                    <li class="social-item"><a href="#" class="social-link" title="Facebook"><img src="{{asset('./images/media/2021/08/social/facebook.svg')}}" alt="Facebook"></a></li>
                                    <li class="social-item"><a href="#" class="social-link" title="Instagram"><img src="{{asset('./images/media/2021/08/social/instagram.svg')}}" alt="Instagram"></a></li>
                                    <li class="social-item"><a href="#" class="social-link" title="Pinterest"><img src="{{asset('./images/media/2021/08/social/pinterest.svg')}}" alt="Pinterest"></a></li>
                                    <li class="social-item"><a href="#" class="social-link" title="Twitter"><img src="{{asset('./images/media/2021/08/social/twitter.svg')}}" alt="Twitter"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="author-name-contain d-flex flex-wrap align-items-center">
                                <div class="name-contain">
								
                                    <h2> {{$result['author']->first_name ?? ''}} {{$result['author']->last_name ?? ''}}<span> {{$result['author']->locality ?? ''}}, {{$result['author']->district ?? ''}}</span></h2>
                                </div>
                                <div class="contain-number ml-md-5 pl-md-3">+91 {{$result['author']->phone ?? ''}}</div>
                                <div class="contain-email ml-md-5 pl-md-3">{{$result['author']->email ?? ''}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- CONTAIN ALL AUTHOR DETAIL -->
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="contain_author_cred_wrapper pb-5 mt-5 d-flex flex-wrap align-items-center justify-content-between">
                        <div class="cred_item d-flex flex-column pb-3 justify-content-center align-items-center">
                            <img src="{{asset('./images/media/2021/08/author-recipe.png')}}" alt="Recipe icon">
                            <h3>{{$result['products_total']}}</h3>
                            <span>Uploaded Recipes</span>
                        </div>
                        <div class="cred_item d-flex flex-column pb-3 justify-content-center align-items-center">
                            <img src="{{asset('./images/media/2021/08/heart-gray.png')}}" alt="Heart">
                            <h3>{{$result['products_liked']}}</h3>
                            <span>Likes</span>
                        </div>
                        <div class="cred_item d-flex flex-column pb-3 justify-content-center align-items-center">
                            <img src="{{asset('./images/media/2021/08/comment-gray.png')}}" alt="Comments">
                            <h3>{{$result['reviews']}}</h3>
                            <span>Reviews</span>
                        </div>
                        <!--<div class="cred_item d-flex flex-column pb-3 justify-content-center align-items-center">
                            <img src="{{asset('./images/media/2021/08/followers-gray.png')}}" alt="Followers">
                            <h3>87</h3>
                            <span>Followers</span>
                        </div>-->
                        <div class="cred_item d-flex flex-column pb-3 justify-content-center align-items-center">
                            <img src="{{asset('./images/media/2021/08/order.png')}}" alt="Received Orders">
                            <h3>{{$result['orders_total']}}</h3>
                            <span>Received Orders</span>
                        </div>
                        <div class="cred_item d-flex flex-column pb-3 justify-content-center align-items-center">
                            <img src="{{asset('./images/media/2021/08/earning.png')}}" alt="Total Earning">
                            <h3>{{$result['total_earnings']}}</h3>
                            <span>Total Earnings</span>
                        </div>
                        <!--<div class="cred_item d-flex flex-column pb-3 justify-content-center align-items-center">
                            <img src="{{asset('./images/media/2021/08/followers-gray.png')}}" alt="Shared">
                            <h3>5642</h3>
                            <span>Shared Times</span>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="row mt-5 pt-4">
                <div class="col-md-10 mx-auto text-center">
                    <h2 class="pb-5">About</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt ad eveniet temporibus, nostrum culpa corrupti hic commodi iusto repudiandae aspernatur beatae, sunt maxime. 
                        Placeat perspiciatis, excepturi optio doloribus quisquam vero.</p>
                    <p>Sint, esse repellat quia autem quidem veritatis earum aut aperiam, rerum ex ab maiores quasi nisi fuga. Voluptate vel esse eum enim minus. Nobis, omnis alias fugit ullam a officia!
                    Molestiae illum sequi quas error voluptas laboriosam veritatis consequatur nostrum quaerat, nemo perspiciatis tempore adipisci, voluptate veniam. Tempora harum sequi quaerat ducimus et inventore a placeat vero? Culpa, sint voluptatibus!. Sint, esse repellat quia autem quidem veritatis earum aut aperiam, rerum ex ab maiores quasi nisi fuga. Voluptate vel esse eum enim minus. Nobis, omnis alias fugit ullam a officia!
                    Molestiae illum sequi quas error voluptas laboriosam veritatis consequatur nostrum quaerat, nemo perspiciatis tempore adipisci, voluptate veniam. Tempora harum sequi quaerat ducimus et inventore a placeat vero? Culpa, sint voluptatibus!</p>
                </div>
            </div>
        </div>

    </main>
 @endsection
