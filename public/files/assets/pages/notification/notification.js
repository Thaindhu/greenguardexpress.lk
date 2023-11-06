  'use strict';
  // $(window).on('load',function(){
  //     //Welcome Message (not for login page)
  //     function notify(message, type){
  //         $.growl({
  //             message: message
  //         },{
  //             type: type,
  //             allow_dismiss: false,
  //             label: 'Cancel',
  //             className: 'btn-xs btn-inverse',
  //             placement: {
  //                 from: 'bottom',
  //                 align: 'right'
  //             },
  //             delay: 2500,
  //             animate: {
  //                     enter: 'animated fadeInRight',
  //                     exit: 'animated fadeOutRight'
  //             },
  //             offset: {
  //                 x: 30,
  //                 y: 30
  //             }
  //         });
  //     };


  //         notify('Welcome to Notification page', 'inverse');

  // });

  $(document).ready(function() {

      /*--------------------------------------
           Notifications & Dialogs
       ---------------------------------------*/


      $('.notifications .btn').on('click', function(e) {
          e.preventDefault();
          var nFrom = $(this).attr('data-from');
          var nAlign = $(this).attr('data-align');
          var nIcons = $(this).attr('data-icon');
          var nType = $(this).attr('data-type');
          var nAnimIn = $(this).attr('data-animation-in');
          var nAnimOut = $(this).attr('data-animation-out');

          notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut);
          //   notify('top', 'right', 'fa fa-comments', 'success', 'animated fadeInDown', 'animated fadeOutUp', 'This is message');
      });

      //   function alert_tt() {
      //       e.preventDefault();
      //       var nFrom = 'top';
      //       var nAlign = 'right';
      //       var nIcons = 'fa fa-comments';
      //       var nType = 'success';
      //       var nAnimIn = 'animated fadeInDown';
      //       var nAnimOut = 'animated fadeOutUp';

      //       notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, 'This is message');
      //   }

  });

  /*
   * Notifications
   */
  function push_alert(type, msg) {
      //   types - inverse | primary | info | success | warning | danger
      if (type == 'success') {
          var title = ' Success ';
          var nIcons = 'fa fa-check-circle ';
      } else {
          var nIcons = 'fa fa-exclamation-circle';
          var title = ' Error ';
      }
      var nFrom = 'top';
      var nAlign = 'right';
      var nType = type;
      var nAnimIn = 'animated fadeInDown';
      var nAnimOut = 'animated fadeOutUp';

      notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, msg, title);
  }

  function notify(from, align, icon, type, animIn, animOut, msg, title) {
      $.growl({
          icon: icon,
          title: title,
          message: msg,
          url: ''
      }, {
          element: 'body',
          type: type,
          allow_dismiss: true,
          placement: {
              from: from,
              align: align
          },
          offset: {
              x: 30,
              y: 30
          },
          spacing: 10,
          z_index: 999999,
          delay: 2500,
          timer: 5000,
          url_target: '_blank',
          mouse_over: false,
          animate: {
              enter: animIn,
              exit: animOut
          },
          icon_type: 'class',
          template: '<div data-growl="container" class="alert" role="alert">' +
              '<button type="button" class="close" data-growl="dismiss">' +
              '<span aria-hidden="true">&times;</span>' +
              '<span class="sr-only">Close</span>' +
              '</button>' +
              '<span data-growl="icon"></span>' +
              '<span data-growl="title"></span>' +
              '<span data-growl="message"></span>' +
              '<a href="#" data-growl="url"></a>' +
              '</div>'
      });
  };