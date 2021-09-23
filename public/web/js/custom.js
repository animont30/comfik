$(document).ready(function(){

    
      $(".home-user-slider").slick({
          dots: false,
          infinite: true,
          autoplay: true,
          autoplaySpeed: 3000,
          speed: 3000,
          slidesToShow: 12,
          slidesToScroll: 3,
          responsive: [
              {
                  breakpoint: 1024,
                  settings: {
                      slidesToShow: 7,
                      slidesToScroll: 3,
                      infinite: true,
                      dots: true
                  }
              },
              {
                  breakpoint: 600,
                  settings: {
                      slidesToShow: 4,
                      slidesToScroll: 2
                  }
              },
              {
                  breakpoint: 480,
                  settings: {
                      slidesToShow: 3,
                      slidesToScroll: 2
                  }
              }
          ]
      });
  
      $(".other-recipe-slider").slick({
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 3000,
        slidesToShow: 4,
        slidesToScroll: 2,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
  
      
  $('.order-item-wrap').hide()
  $('.recipes-buzzer-wrap a').on('click', function(e){
    e.preventDefault();
    $(this).parents('.post-content').next('.order-item-wrap').toggle('4000');
   });
  
  //  WANT TO SELL TOGGLE SWITCH
  $('.upload_recipe_Wrapper .switch input').on('change',function(){
    if($(this).is(":checked"))  { 
      $('.upload_recipe_Wrapper .recipe-sell-options').show();
    }
     else
    { 
    $('.upload_recipe_Wrapper .recipe-sell-options').hide();
   }
    });
  

    $('.recipe_featured_img .thumb_item').on('click',function(e){
      e.preventDefault();
      e.stopPropagation();
      var thumbImg = jQuery(this).find('.pick').attr('src');
         if($('.thumb_item').hasClass('.video'))
         {
           alert('sdfds');
          var thumb = $(this).data('thumbnail');
          $('.contain_featured_img').html('<iframe width="560" height="315" src="'+thumb+'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="picked"></iframe>');
        }
         else{
             $('.contain_featured_img').html('<img src="'+thumbImg+'" class="img-fluid" alt="Featured Image">');
            }
    });
  
   

      $('.index-filter-categories-select').hover(function(){
        $(this).addClass('active');
      }, function(){
        $(this).removeClass('active');
      });
      $('.header-join-form').hide();
      $('.topbar-menu .join-btn').click(function(e){
        e.preventDefault();
        $('.header-join-form').toggle();
      });
      $(document).mouseup(function(e) 
      {
          var container = $(".header-join-form");
          // if the target of the click isn't the container nor a descendant of the container
          if (!container.is(e.target) && container.has(e.target).length === 0) 
          {
              container.hide();
          }
      });
  
      // PROFILE DROPDOWN 
      $('ul.Prof-dropdown-menu').hide();
      $('.topbar-menu a.top_links.header_avatar').click(function(e){
        e.preventDefault();
        $('ul.Prof-dropdown-menu').toggle();
      });
      $(document).mouseup(function(e) 
      {
          var container = $("ul.Prof-dropdown-menu");
          // if the target of the click isn't the container nor a descendant of the container
          if (!container.is(e.target) && container.has(e.target).length === 0) 
          {
              container.hide();
          }
      });
  

  
  
  

  
  
  
  
  
  });