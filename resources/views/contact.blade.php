@extends('layout')
@section('main')
<div class="container concolor p-3 text-white">
  <div class="paragraph">
    <form method="post">
        @csrf
      <div class="row px-5 justify-content-md-center ">
      <div class="col-md-auto">
          <label for="firstname" class="form-label">First Name</label>
          <input type="text" id="firstname" name="firstname" class="form-control">
        @error('firstname')
            {{$message}}
        @enderror
        </div>
        <div class="col-md-auto">
          <label for="lastname" class="form-label">Last Name</label>
          <input type="text" id="lastname" name="lastname" class="form-control">
          @error('lastname')
          {{$message}}
      @enderror
        </div>
      </div>
      @guest
      <div class="row px-5 justify-content-md-center pt-3">
        <div class="col-md-4">
          <label for="contactemail" class="form-label">Email</label>
          <input type="email" id="contactemail" name="contactemail" class="form-control">
          @error('contactemail')
          {{$message}}
      @enderror
        </div>
      </div>
      @endguest
      <div class="row px-5 justify-content-md-center pt-3 ">
        <div class="col-md-6">
          <label for="messages" class="form-label">Message</label>
          <textarea id="messages" name="messages" maxlength="255" placeholder="max. 255 character" cols="40" rows="5" class="form-control" style="resize: none;"></textarea>
          @error('messages')
          {{$message}}
      @enderror
        </div>
      </div>
      <div class="row px-5 justify-content-md-center pt-3 pb-3">
        <div class="col-md-6">
          <button id="popup-link" name="btcontact" type="submit" class="btn custombtn float-end"><span>Send message</span></button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
