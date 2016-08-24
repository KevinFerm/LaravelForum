loadCats = ->
  $.get '/forum/getcats',
  (data) ->
    $('.categories_show').empty()
    $('.categories_show').append(data)
    console.log("Appended data")
$ ->
  ###############################
  ########FOR ADMIN PAGE#########
  ###############################

  $("#summernote").summernote({
    height: 300
    width: 500
    })

  #Load category partial on dom ready / only on admin page
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

  $(document).on "click", "#create_topic_button", (event) ->
    pis("create_topic_form").submit(['post_text', 'title'])



#AAAAAAAAAAAAAAAAA
#THIS IS THE SECURITY STUFF
pis = (id) ->
  about =
    Version: 0.01
    Author: 'Kevin Ferm'
    Created: 'March 2016'
    Updated: '31/3-16'
  if id
    #Create instance of function
    if window == this
      return new pis(id)
    @e = document.getElementById(id)
    this
  else
    about

base64Decode = (base64) ->
  data = base64.split(',')
  imgtype = data[0].match(/:([^}]*);/)[1]
  decoded = atob(data[1])
  buffer = new ArrayBuffer(decoded.length)
  view = new Uint8Array(buffer)
  i = decoded.length - 1
  while i >= 0
    view[i] = decoded.charCodeAt(i)
    i--
  console.log view
  return

pis.prototype =
  submit: (fields) ->
    # implementation
    if fields
      #Search fields that are named in the array
      i = fields.length - 1
      while i >= 0
        if @e[fields[i]]
          if @e[fields[i]].type == 'text' or @e[fields[i]].type == 'hidden' or @e[fields[i]].type == 'password' or @e[fields[i]].type == 'textarea'
            #Do the checking here
            console.log @coordCheck(@e[fields[i]].value)
            if @emailCheck(@e[fields[i]].value)
              alert 'There is an email address contained in your message, are you sure you want to post this? - ' + @e[fields[i]].value
            if @coordCheck(@e[fields[i]].value)
              alert 'There is a coordinate contained in your message, are you sure you want to post this? - ' + @e[fields[i]].value
            if @genderCheck(@e[fields[i]].value)
              alert 'There is a gender contained in your message, are you sure you want to post this? - ' + @e[fields[i]].value
            if @phoneCheck(@e[fields[i]].value)
              alert 'There is a phone number contained in your message, are you sure you want to post this? - ' + @e[fields[i]].value
            console.log @e[fields[i]].value
          else if @e[fields[i]].type == 'file'
            console.log 'FILE TYPE'
            @readImage @e[fields[i]]
          else
            console.log fields[i] + ' has no value'
        else
          console.log 'There is no such field as: ' + fields[i]
        i--
    else
      #Search all
    console.log @e
    this.e.submit();
    this
  readImage: (input) ->
    if input.files and input.files[0]
      reader = new FileReader

      reader.onload = (e) ->
        #console.log(e.target.result);
        base64Decode e.target.result
        e

      reader.readAsDataURL input.files[0]
    return
  emailCheck: (input) ->
    pattern = /^(\w|\-|\_|\.)+\@((\w|\-|\_)+\.)+[a-zA-Z]{2,}$/
    pattern.test input
  genderCheck: (input) ->
    pattern = /^(fe)?male$/
    pattern.test input
  phoneCheck: (input) ->
    pattern = /^([+]47)?((38[{8,9}|0])|(34[{7-9}|0])|(36[6|8|0])|(33[{3-9}|0])|(32[{8,9}]))([\d]{7})$/
    pattern.test input
  coordCheck: (input) ->
    pattern = /^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?),\s*[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/
    pattern.test input
