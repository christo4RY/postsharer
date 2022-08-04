<!-- Button trigger modal -->
<button type="button" class="btn mx-3 rounded-circle nav-link btn-link" data-bs-toggle="modal"
    data-bs-target="#exampleModal">
    <img src="{{auth()->user()->avator }}" class="rounded-circle border border-info border-2" height="50" width="50"
        alt="">
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modalHeader">
                <h3 class="text-primary h2">Profile</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-profile">
                    <div>
                        <img src="{{auth()->user()->avator }}" class="profile" height="150" width="180" alt="">
                    </div>
                    <h3 class="text-primary my-3">{{ auth()->user()->name }}</h3>
                    <ul class="list-group">
                        <li class="list-group-item text-start"><b>Email: </b> {{ auth()->user()->email }}</li>
                        <li class="list-group-item pt-3">
                            <form action="/upload/{{ auth()->user()->username }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="file" name="avator" class="form-control d-inline-block w-50">
                                <button type="submit" class="btn btn-outline-primary">Upload</button>
                            </form>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                <form action="/logout" method="">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
