
$( document ).ready(function() {
  let $modal = $('.modal');
  let $collapseOne = $('#collapseOne');
  let $collapseTwo = $('#collapseTwo');

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // Actions
  $modal.on('click','.show_add_action_form', function (e) {
    e.preventDefault();
    var btn = $(this);
    var url = btn.data('url');
    console.log(url)
    var method = btn.data('method');
    var data = $('.data_form').serialize();
    sendAjax(method, url, data, '.modal .active .modal-body');
  });

  $modal.on('click','.save_new_action', function (e) {
    e.preventDefault();
    var btn = $(this);
    var url = btn.data('url');
    var method = btn.data('method');
    var action = btn.data('action');
    var data = $('.action-data-form-' + action).serialize();
    sendAjax(method, url, data);
  });

  $modal.on('click','.delete_action', function (e) {
    e.preventDefault();
    var conf = confirm('Are you sure?')
    if (!conf) return;
    var btn = $(this);
    var url = btn.data('url');
    var method = btn.data('method');
    var action = btn.data('action');
    var data = $('.action-data-form-' + action).serialize();
    sendAjax(method, url, data, '.modal .active .modal-body');
  });

  $modal.on('click','.back', function (e) {
    e.preventDefault();
    var btn = $(this);
    var url = btn.data('url');
    var method = btn.data('method');
    var data = $('.data_form').serialize();
    sendAjaxAndShowModal(method, url, data);
    $modal.modal('show');
  });


  $modal.on('click','.clear_row', function (e) {
    e.preventDefault();
    var btn = $(this);
    var tr = btn.parents()[1];
    tr.remove();
  });

  $modal.on('click','.add_row', function (e) {
    e.preventDefault();
    var btn = $(this);
    var url = btn.data('url');
    var method = btn.data('method');
    var action = btn.data('action');
    sendAjax(method, url, {}, '.action-data-form-' + action + ' table tbody', true);
    console.log(url)
  });

  $modal.on('change','#source', function (e) {
    e.preventDefault();
    var select = $(this);
    console.log(select.val())
  });

  $modal.on('change','.row-checkbox .form-check-input', function (e) {
    e.preventDefault();
    var ch = $(this);
    var par = ch.parents().parents()[1].children;
    var key = $(par[0].children[0]).val();
    var data = $(par[1].children[0]).val();
    ch.attr('value', key);
    ch.attr('name', 'unique_data[' + data + ']');
  });

  $modal.on('input','tr.text-center .form-control', function (e) {
    var inp = $(this);
    var attribute = $(this).data('key');
    inp.closest('tr').find("input[type=checkbox]").attr(attribute, inp.val());
  });

  // Providers
  $('.install_new_provider').on('click', function (e) {
    e.preventDefault();
    var btn = $(this);
    var url = btn.data('url');
    var method = btn.data('method');
    var data = {};
    sendAjaxAndShowModal(method, url, data);
    $modal.modal('show');
  });

  $modal.on('click','.install_provider', function (e) {
    e.preventDefault();
    var btn = $(this);
    var url = btn.data('url');
    var method = btn.data('method');
    var data = $('.data_form').serialize();
    sendAjaxProvider(method, url, data, '#collapseTwo .card-body');
    $modal.modal('hide');
  });


  // Clients
  $('.add_provider_client').on('click', function (e) {
    e.preventDefault();
    var btn = $(this);
    var url = btn.data('url');
    var method = btn.data('method');
    var data = {};
    sendAjaxAndShowModal(method, url, data);
    $modal.modal('show');
  });

  $modal.on('click', '.save_provider_client', function (e) {
    e.preventDefault();
    var btn = $(this);
    var url = btn.data('url');
    var method = btn.data('method');
    var data = $('.data_form').serialize();
    sendAjax(method, url, data, '#collapseTwo .card-body');
    $modal.modal('hide');
  });

  $collapseTwo.on('click', '.edit_provider_client', function (e) {
    e.preventDefault();
    var btn = $(this);
    var url = btn.data('url');
    var method = btn.data('method');
    var data = {};
    sendAjaxAndShowModal(method, url, data);
    $modal.modal('show');
  });

  $collapseTwo.on('click', '.delete_provider_client', function (e) {
    e.preventDefault();
    var conf = confirm('Are you sure?')
    if (!conf) return;
    var btn = $(this);
    var url = btn.data('url');
    var method = btn.data('method');
    var data = {};
    sendAjax(method, url, data, '#collapseTwo .card-body');
  });

  $modal.on('click', '.save_provider', function (e) {
    e.preventDefault();
    var btn = $(this);
    var url = btn.data('url');
    var method = btn.data('method');
    var data = $('.data_form').serialize();
    sendAjax(method, url, data, '#collapseTwo .card-body');
    $modal.modal('hide');
  });

  function sendAjaxAndShowModal(method, url, data){
    $.ajax({
      type: method,
      url: url,
      data: data,
      cache: false,
      success: function(res){
        $modal = $('.modal');
        $('.modal .modal-content').html(res['content']);
        return true;
      }
    });
    return false;
  }

  function sendAjax(method, url, data, selector = null, prepend = false){
    $.ajax({
      type: method,
      url: url,
      data: data,
      cache: false,
      success: function(res){
        if (selector && !prepend)
          $(selector).html(res['content']);
        if (selector && prepend)
          $(selector).after(res['content']);
        console.log(res);
      }
    });
    return false;
  }

  function sendAjaxProvider(method, url, data, selector){
    $.ajax({
      type: method,
      url: url,
      data: data,
      cache: false,
      success: function(res){
        $(selector).html(res['content']);
        if (!res['disabled']) {
          $('.add_provider_client').removeAttr('disabled')
        }
      }
    });
    return false;
  }

  $('.close_modal').on('click', function (e) {
    e.preventDefault();
    $modal.modal('hide');
  });


});

