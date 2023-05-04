<div class="row">
    @foreach($users as $user)
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title"><b>{{ $user->name }}</b></h5>
            <p class="card-text"><b>{{ $user->department_name }}</b></p>
            <p class="card-text">{{ $user->designation_name }}</p>
            <p class="card-text">{{ $user->phone_number }}</p>
          </div>
        </div>
      </div>
    @endforeach
</div>
  