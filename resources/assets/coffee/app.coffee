loadCats = ->
  $.get '/forum/getcats',
  (data) ->
    $('.categories_show').empty()
    $('.categories_show').append(data)
    console.log("Appended data")
$ ->
  console.log("Dom Ready")
  if('.categories_show')
    loadCats()
  $(document).on "click", ".cat_del", (event) ->
    $.ajax '/forum/deleteforum',
      type: 'DELETE'
      headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()}
      data: {forum_id: event.target.id.split("_")[2] }
      error: (jqXHR, textStatus, errorThrown) ->
        console.log(textStatus)
      success: (data, textStatus, jqXHR) ->
        loadCats()
    console.log(event.target.id.split("_")[2])

  $(document).on "click",'.forum_del', (event) ->
    $.ajax '/forum/deleteforum',
      type: 'DELETE'
      headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()}
      data: {forum_id: event.target.id.split("_")[2] }
      error: (jqXHR, textStatus, errorThrown) ->
        console.log(textStatus)
      success: (data, textStatus, jqXHR) ->
        loadCats()
    console.log(event.target.id.split("_")[2])

  $(document).on "change",'.change_cat', (event) ->
    $.ajax '/forum/changecat',
      type: 'PATCH'
      headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()}
      data: {forum_id: event.target.id.split("_")[2], cat_id: event.target.value}
      error: (jqXHR, textStatus, errorThrown) ->
      #console.log(textStatus)
      success: (data, textStatus, jqXHR) ->
        loadCats()
    console.log(event.target.value)
