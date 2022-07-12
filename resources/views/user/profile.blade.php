@extends('layouts.dashboard')
@section('content')
<style>
.nav-tabs>li{
    margin: 0;
}
.fade:not(.show) {
    display: none;
}
.education_posi{
    position: absolute;
    top: 40px;
    left: 45px;
    text-transform: uppercase;
}
/*.education_detail{
    position: absolute;
    top: 50px;
    left: 45px;
    text-transform: uppercase;
}*/
.education_detail {
    margin-left: 30px !important;
    display: block;
    margin-top: 20px !important;
}
</style>
<div class="col-lg-9 col-md-12 col-sm-12 ps-3">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="text_size-24 font_weight--500">Welcome {{ Auth::user()->first_name.' '.Auth::user()->last_name }}</div>
    </div>
    <div class="stock_update mb-3">
        <div class="align-items-center justify-content-between mb-3">
            <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">Personal Basic</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="false" >Security</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="tab" href="#ex1-tabs-3" role="tab" aria-controls="ex1-tabs-3" aria-selected="false" >Details</a>
              </li>
            </ul>
        </div>
        <div class="tab-content" id="ex1-content">
            <form action="{{ route('profile.update',['id' => $users->id]) }}" method="post" enctype="multipart/form-data"  autocomplete="off">
                    @csrf
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                    @endforeach
                    @endif
                    @if(session()->has('message'))
                    <p class="text-success">
                        {{ session()->get('message') }}
                    </p>
                    @endif
                <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                    <h4>Basic Profile:</h4>
                    <fieldset class="form-group">
                        <label for="exampleInputfirstName">First Name</label>
                        <input type="text" class="form-control" id="exampleInputfirstName" placeholder="Enter email" value="{{ $users->first_name }}" name="first_name" required="">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="exampleInputlastName">Last Name</label>
                        <input type="text" class="form-control" id="exampleInputlastName" placeholder="Enter email" value="{{ $users->last_name }}" name="last_name" required="">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $users->email }}" name="email" required="">
                        <small class="text-muted">We'll never share your email with anyone else.</small>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="exampleInputphone">Phone</label>
                        <input type="text" class="form-control" id="exampleInputphone" placeholder="Enter Phone" value="{{ $users->phone }}" name="phone">
                        <small class="text-muted">We'll never share your phone with anyone else.</small>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="exampleInputlastdob">Date of Birth</label>
                        <input type="date" class="form-control" id="exampleInputlastdob" placeholder="Enter DOB" value="{{ $users->date_of_birth }}" name="date_of_birth" required="">
                    </fieldset>
                    <!-- <fieldset class="form-group">
                        <label for="exampleSelect1">Status</label>
                        <select class="form-control color-black" id="eexampleSelect11" name="status">
                            <option value="active" {{ $users->status == 'active'?'selected':'' }}>Active</option>
                            <option value="pending" {{ $users->status == 'pending'?'selected':'' }}>Pending</option>
                            <option value="inactive" {{ $users->status == 'inactive'?'selected':'' }}>Inactive</option>
                            <option value="suspended" {{ $users->status == 'suspended'?'selected':'' }}>Suspend</option>
                        </select>
                    </fieldset> -->
                    <fieldset class="form-group">
                        <label for="exampleInputstate">State</label>
                        <input type="text" class="form-control" id="exampleInputstate" placeholder="Enter State" value="{{ $users->state }}" name="state">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="exampleInputcountry">Country</label>
                        <input type="text" class="form-control" id="exampleInputcountry" placeholder="Enter Country" value="{{ $users->country }}" name="country">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="exampleInputcity">City</label>
                        <input type="text" class="form-control" id="exampleInputcity" placeholder="Enter City" value="{{ $users->city }}" name="city">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="exampleInputzipcode">Zip Code</label>
                        <input type="text" class="form-control" id="exampleInputzipcode" placeholder="Enter Country" value="{{ $users->zip_code }}" name="zip_code">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="exampleInputprofileImg">Profile Image</label>
                        <input type="file" class="form-control" id="exampleInputprofileImg" name="profile_img" accept="image/png, image/gif, image/jpeg">
                    </fieldset>
                </div>
            <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                <h4>Security Setting:</h4>
                <fieldset class="form-group">
                    <label for="exampleInputoldPassword">Old Password</label>
                    <input type="password" class="form-control" id="exampleInputoldPassword" placeholder="Enter Old Password" name="old_password"  autocomplete="off">
                    <small class="text-muted">If You want to Change Password than Provide Old Password Or If you want other changes you don't require password</small>
                </fieldset>
                <fieldset class="form-group">
                    <label for="exampleInputnewPassword">New Password</label>
                    <input type="password" class="form-control" id="exampleInputnewPassword" placeholder="Enter New Password" name="password">
                </fieldset>
                <fieldset class="form-group">
                    <label for="exampleInputsecretquestion">Secret Question</label>
                    <input type="text" class="form-control" id="exampleInputsecretquestion" placeholder="Enter Secret Question" name="secret_question">
                </fieldset>
                <fieldset class="form-group">
                    <label for="exampleInputsecretanswer">Secret Question's Answer</label>
                    <input type="text" class="form-control" id="exampleInputsecretanswer" placeholder="Enter Secret Question's Answer" name="secret_answer">
                </fieldset>
                <fieldset class="form-group">
                    <label for="eexampleSelectpv">Profile Visibility</label>
                    <select class="form-control color-black" id="eexampleSelectpv" name="profile_visibility">
                        <option value="public" {{ $users->profile_visibility == 'public'?'selected':'' }}>Public</option>
                        <option value="friends-of-friend" {{ $users->profile_visibility == 'friends-of-friend'?'selected':'' }}>Friends of Friend</option>
                        <option value="friends-only" {{ $users->profile_visibility == 'friends-only'?'selected':'' }}>Friends Only</option>
                        <option value="private" {{ $users->profile_visibility == 'private'?'selected':'' }}>No One</option>
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <label for="exampleSelectps">Profile Visibility</label>
                    <select class="form-control color-black" id="exampleSelectps" name="profile_status">
                        <option value="online" {{ $users->profile_status == 'online'?'selected':'' }}>Online</option>
                        <option value="offline" {{ $users->profile_status == 'offline'?'selected':'' }}>Offline</option>
                    </select>
                </fieldset>
            </div>
            <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                <h4>Details:</h4>
                <section>
                <fieldset class="form-group">
                    <label for="exampleInputbio">Synopsis</label>
                    <textarea class="form-control" cols="6" rows="6" id="exampleInputbio" placeholder="Add Synopsis" name="bio_description">{{ $users->bio_description }}</textarea>
                </fieldset>
                </section>
                <section class="education_sec">
                <fieldset class="form-group show_education">
                    <label for="exampleSelecteducation">Education</label>
                    @foreach($users->education as $education)
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title eduname"><i class="fa fa-user-graduate me-2"></i>{{$education->name}}</h4>
                                <div class="float-end m-auto text-end">
                                    <span class="cursor-pointer" data-edu-id="{{ $education->id }}" onclick="educationEdit(this)"><i class="fa fa-pencil"></i></span>
                                    <span><i class="fa fa-trash-alt"></i></span>
                                </div>
                            </div>
                            <p class="card-text education_posi">
                                <span class="dg_title">{{$education->degree_title}}</span>
                                <span class="dg_name">{{ $education->degree_name }}</span>
                            </p>
                            <span class="education_detail">
                            <p class="card-text dg_address" data-country="{{ $education->country }}" data-state="{{ $education->state }}" data-city="{{ $education->city }}" data-zipcode="{{ $education->zipcode }}"><i class="fa fa-map-marker-alt me-2"></i>{{ $education->address }}</p>
                            </span>
                        </div>
                    </div>
                    @endforeach
                </fieldset>
                </section>
                <div class="row add_education d-none">
                    <h6 class="text-danger error"></h6>
                    <div class="col-6">    
                    <fieldset class="form-group">
                        <label for="degree_title">Degree Title:</label>
                        <select name="degree_title" id="degree_title" class="form-control">
                            <option value="">Degree Title</option>
                            <option value="A-level">A/Level</option>
                            <option value="O-level">O/Level</option>
                            <option value="SSC">SSC</option>
                            <option value="HSC">HSC</option>
                            <option value="Bs">Bs</option>
                            <option value="BE">BE</option>
                            <option value="Ms">Ms</option>
                            <option value="ME">ME</option>
                            <option value="phd">Ph.D</option>
                            <option value="diploma">Diploma</option>
                        </select>
                    </fieldset>
                    </div>
                    <div class="col-6">
                    <fieldset class="form-group">
                        <label for="degree_name">Degree Name</label>
                        <input type="text" name="edu_name" class="form-control" id="edu_name" value="" placeholder="Degree Name">
                    </fieldset>
                    </div>
                    <div class="col-6">
                    <fieldset class="form-group">
                        <label for="edu_uni_name">College/University Name</label>
                        <input type="text" class="form-control" name="edu_uni_name" id="edu_uni_name" value="" placeholder="Degree Name">
                    </fieldset>
                    </div>
                    <div class="col-6">
                    <fieldset class="form-group">
                        <label for="edu_country">Country</label>
                        <input type="text" class="form-control" name="edu_country" id="edu_country" value="" placeholder="Country">
                    </fieldset>
                    </div>
                    <div class="col-6">
                    <fieldset class="form-group">
                        <label for="edu_state">State</label>
                        <input type="text" class="form-control" name="edu_state" id="edu_state" value="" placeholder="State">
                    </fieldset>
                    </div>
                    <div class="col-6">
                    <fieldset class="form-group">
                        <label for="edu_city">City</label>
                        <input type="text" class="form-control" name="edu_city" id="edu_city" value="" placeholder="City">
                    </fieldset>
                    </div>
                    <div class="col-6">
                    <fieldset class="form-group">
                        <label for="edu_address">Address</label>
                        <input type="text" class="form-control" name="edu_address" id="edu_address" value="" placeholder="Address">
                    </fieldset>
                    </div>
                    <div class="col-6">
                    <fieldset class="form-group">
                        <label for="edu_zipcode">Zipcode</label>
                        <input type="text" class="form-control" name="edu_zipcode" id="edu_zipcode" value="" placeholder="Zipcode">
                    </fieldset>
                    </div>
                    <div class="col-12">
                        <button type="button" id="addEducation" class="btn btn-secondary w-100 mt-4 mb-4">ADD</button>
                        <button type="button" id="editEducation" class="btn btn-secondary w-100 mt-4 mb-4 d-none">Update</button>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="$('.add_education').toggleClass('d-none'); $('#editEducation').addClass('d-none')">Add Education</button>

                <section class="workhistory_sec">
                <fieldset class="form-group show_workhistory">
                    <label for="exampleSelecteducation">Work History</label>
                    @foreach($users->workHistory as $workHistory)
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title eduname"><i class="fa fa-user-hard-hat me-2"></i>{{$workHistory->name}}</h4>
                                <div class="float-end m-auto text-end">
                                    <span class="cursor-pointer" data-edu-id="{{ $workHistory->id }}" onclick="workHistoryEdit(this)"><i class="fa fa-pencil"></i></span>
                                    <span><i class="fa fa-trash-alt"></i></span>
                                </div>
                            </div>
                            <p class="card-text education_posi">
                                <span class="dg_title">{{$workHistory->degree_title}}</span>
                            </p>
                            <span class="education_detail">
                            <p class="card-text dg_address" data-country="{{ $workHistory->country }}" data-state="{{ $workHistory->state }}" data-city="{{ $workHistory->city }}" data-zipcode="{{ $workHistory->zipcode }}"><i class="fa fa-map-marker-alt me-2"></i>{{ $workHistory->address }}</p>
                            </span>
                        </div>
                    </div>
                    @endforeach
                </fieldset>
                </section>
                <div class="row add_workhistory d-none">
                    <h6 class="text-danger error"></h6>
                    <div class="col-6">    
                    <fieldset class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="work_title" id="title">
                    </fieldset>
                    </div>
                    <div class="col-6">
                    <fieldset class="form-group">
                        <label for="edu_uni_name">Company Name</label>
                        <input type="text" class="form-control" name="work_comp_name" id="edu_uni_name" value="" placeholder="Company Name">
                    </fieldset>
                    </div>
                    <div class="col-6">
                    <fieldset class="form-group">
                        <label for="edu_country">Country</label>
                        <input type="text" class="form-control" name="work_country" id="edu_country" value="" placeholder="Country">
                    </fieldset>
                    </div>
                    <div class="col-6">
                    <fieldset class="form-group">
                        <label for="edu_state">State</label>
                        <input type="text" class="form-control" name="work_state" id="edu_state" value="" placeholder="State">
                    </fieldset>
                    </div>
                    <div class="col-6">
                    <fieldset class="form-group">
                        <label for="edu_city">City</label>
                        <input type="text" class="form-control" name="work_city" id="edu_city" value="" placeholder="City">
                    </fieldset>
                    </div>
                    <div class="col-6">
                    <fieldset class="form-group">
                        <label for="edu_address">Address</label>
                        <input type="text" class="form-control" name="work_address" id="edu_address" value="" placeholder="Address">
                    </fieldset>
                    </div>
                    <div class="col-6">
                    <fieldset class="form-group">
                        <label for="edu_zipcode">Zipcode</label>
                        <input type="text" class="form-control" name="work_zipcode" id="edu_zipcode" value="" placeholder="Zipcode">
                    </fieldset>
                    </div>
                    <div class="col-12">
                        <button type="button" id="addworkHistory" class="btn btn-secondary w-100 mt-4 mb-4">ADD</button>
                        <button type="button" id="editworkHistory" class="btn btn-secondary w-100 mt-4 mb-4 d-none">Update</button>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="$('.add_workhistory').toggleClass('d-none'); $('#editworkHistory').addClass('d-none')">Add Work History</button>

                <section class="skills">
                    <fieldset>
                     <label>Skills</label>
                     <ul class="list-group list-group-horizontal show_skills flex-lg-wrap">
                       @foreach($users->skills as $skill)
                          <li class="list-group-item mb-2" data-id = "{{ $skill->id }}">{!! $skill->name !!} <i class="fa fa-times-circle cursor-pointer ms-2" onclick="$(this).parent().remove()"></i></li>
                       @endforeach
                     </ul>
                    </fieldset>
                </section>
                <div class="row add_skills d-none">
                    <div class="skillError"></div>
                    <div class="col-sm-12 col-md-12">
                        <label for="skill">Skill Name</label>
                        <input type="text" id="skill" name="skill_name" placeholder="Skill" class="form-control">
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary" id="addSkills">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4 bordered">
                        <ul class="list-group list-group-horizontal skill_box">
                            
                        </ul>
                        <button type="button" class="btn btn-secondary mt-4" id="submitSkills">Submit</button>
                    </div>
                </div>
                <button type="button" class="btn btn-primary mt-4" onclick="$('.add_skills').toggleClass('d-none'); $('#editskills').addClass('d-none')">Add Skills</button>

                <section class="political_Preferences_sec">
                <fieldset class="form-group show_political_Preferences">
                    <label for="exampleSelecteducation">Political Preferences</label>
                    @foreach($users->political_Preferences as $politicalPreferences)
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title eduname"><i class="fa fa-user-hard-hat me-2"></i>{{$politicalPreferences->name}}</h4>
                                <div class="float-end m-auto text-end">
                                    <span class="cursor-pointer" data-edu-id="{{ $politicalPreferences->id }}" onclick="politicalPreferencesEdit(this)"><i class="fa fa-pencil"></i></span>
                                    <span><i class="fa fa-trash-alt"></i></span>
                                </div>
                            </div>
                            <p class="card-text education_posi">
                                <span class="dg_title">{{$politicalPreferences->degree_title}}</span>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </fieldset>
                </section>
                <div class="row add_political_prefrences d-none">
                    <h6 class="text-danger pp-error"></h6>
                    <div class="col-6">    
                    <fieldset class="form-group">
                        <label for="party">Political Party:</label>
                        <input type="text" class="form-control" name="party" id="party">
                    </fieldset>
                    </div>
                    <div class="col-6">
                    <fieldset class="form-group">
                        <label for="party_desc">Description</label>
                        <textarea name="party_desc" id="party_desc" class="form-control" rows="6" cols="6"></textarea>
                    </fieldset>
                    </div>
                    <div class="col-12">
                        <button type="button" id="addPoliticalPrefrences" class="btn btn-secondary w-100 mt-4 mb-4">ADD</button>
                        <button type="button" id="editPoliticalPrefrences" class="btn btn-secondary w-100 mt-4 mb-4 d-none">Update</button>
                    </div>
                </div>
                @if(count($users->political_Preferences) <= 0)
                <button type="button" class="btn btn-primary" onclick="$('.add_political_prefrences').toggleClass('d-none'); $('#editPoliticalPrefrences').addClass('d-none')">Add Political Prefrences</button>
                @endif
            </div>
                <button type="submit" class="btn green_btn mt-3">Update</button>
            </form>
        </div>
        
    </div>
</div>
<script>
    $('a[data-mdb-toggle="tab"]').click(function() {
        $('.nav-link').removeClass('active')
        $(this).addClass('active');
        $('.tab-pane').removeClass(['show','active'])
        $(`div${$(this).attr('href')}`).addClass(['show','active'])
        /* Act on the event */
        // alert();
    });

    $('button#addEducation').click(function() {
        // alert()
        let degree_title = $('select[name="degree_title"]').val();
        let degree_name = $('input[name="edu_name"]').val();
        let college_name = $('input[name="edu_uni_name"]').val();
        let edu_country = $('input[name="edu_country"]').val();
        let edu_state = $('input[name="edu_state"]').val();
        let edu_city = $('input[name="edu_city"]').val();
        let edu_address = $('input[name="edu_address"]').val();
        let edu_zipcode = $('input[name="edu_zipcode"]').val();

        if(degree_title == '' || degree_title == undefined)
        {
            $('.error').html('Enter Degree Title');
            return false;
        }
        if(degree_name == '' || degree_name == undefined)
        {
            $('.error').html('Enter Degree Name');
            return false;
        }
        if(college_name == '' || college_name == undefined)
        {
            $('.error').html('Enter College Name');
            return false;
        }

        $.ajax({
            url: `{{route('addEducation', Auth::user()->id)}}`,
            type: 'POST',
            headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
            data: {degree_title: degree_title, degree_name: degree_name, college_name: college_name, edu_country: edu_country, edu_state: edu_state, edu_city, edu_city, edu_address: edu_address, edu_zipcode: edu_zipcode, type: 'education', position: 'student'},
        })
        .done(function(resp) {
         
            let html = `<div class="card bg-dark">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title eduname"><i class="fa fa-user-graduate me-2"></i>${college_name}</h4>
                                <div class="float-end m-auto text-end">
                                    <span class="cursor-pointer" data-edu-id="${resp.eduId}" onclick="educationEdit(this)"><i class="fa fa-pencil"></i></span>
                                    <span><i class="fa fa-trash-alt"></i></span>
                                </div>
                            </div>
                            <p class="card-text education_posi">
                                <span class="dg_title">${degree_title}</span>
                                <span class="dg_name">${degree_name}</span>
                            </p>
                            <span class="education_detail">
                            <p class="card-text dg_address" data-country="${resp.education.country}" data-state="${resp.education.state}" data-city="${resp.education.city}" data-zipcode="${resp.education.zipcode}"><i class="fa fa-map-marker-alt me-2"></i>${edu_address}</p>
                            </span>
                        </div>
                    </div>`;
            $('.show_education').append(html);
            $('.add_education input').val('');
            $('.add_education').toggleClass('d-none');
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    });

    function educationEdit(data) {

        let eduId = $(data).attr('data-edu-id');
        let parent = $(data).parents('div.card');
        let college_name = $(parent).find('h4.eduname').text();
        let degree_title = $(parent).find('span.dg_title').text();
        let degree_name = $(parent).find('span.dg_name').text();
        let degree_address = $(parent).find('p.dg_address').text();
        let country = $(parent).find('p.dg_address').attr('data-country');
        let state = $(parent).find('p.dg_address').attr('data-state');
        let city = $(parent).find('p.dg_address').attr('data-city');
        let zipcode = $(parent).find('p.dg_address').attr('data-zipcode');
        $(data).parents('div.card').remove();
        $('select[name="degree_title"] option').each((index, value)=>{
            let opt_text = $(value).text();
            if(opt_text.toLowerCase() === degree_title.toLowerCase()){
                $(value).attr('selected','selected')
            }
        })
        $('input[name="edu_name"]').val(degree_name)
        $('input[name="edu_uni_name"]').val(college_name);
        $('input[name="edu_country"]').val(country)
        $('input[name="edu_state"]').val(state)
        $('input[name="edu_city"]').val(city)
        $('input[name="edu_address"]').val(degree_address)
        $('input[name="edu_zipcode"]').val(zipcode)
        $('#editEducation').attr('data-edu-id', eduId)
        $('.add_education').toggleClass('d-none');
        $('#addEducation').addClass('d-none')
        $('#editEducation').removeClass('d-none')
        // console.log(eduId,college_name,degree_title,degree_name,degree_address);
        // body...
    }

    $('button#editEducation').click(function() {
        // alert()
        // console.log($(this).attr('data-edu-id'))
        // return false;
        let degree_title = $('select[name="degree_title"]').val();
        let degree_name = $('input[name="edu_name"]').val();
        let college_name = $('input[name="edu_uni_name"]').val();
        let edu_country = $('input[name="edu_country"]').val();
        let edu_state = $('input[name="edu_state"]').val();
        let edu_city = $('input[name="edu_city"]').val();
        let edu_address = $('input[name="edu_address"]').val();
        let edu_zipcode = $('input[name="edu_zipcode"]').val();

        if(degree_title == '' || degree_title == undefined)
        {
            $('.error').html('Enter Degree Title');
            return false;
        }
        if(degree_name == '' || degree_name == undefined)
        {
            $('.error').html('Enter Degree Name');
            return false;
        }
        if(college_name == '' || college_name == undefined)
        {
            $('.error').html('Enter College Name');
            return false;
        }

        $.ajax({
            url: `update-education/{{Auth::user()->id}}/${$(this).attr('data-edu-id')}`,
            type: 'POST',
            headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
            data: {degree_title: degree_title, degree_name: degree_name, college_name: college_name, edu_country: edu_country, edu_state: edu_state, edu_city, edu_city, edu_address: edu_address, edu_zipcode: edu_zipcode, type: 'education', position: 'student'},
        })
        .done(function(resp) {
            let html = `<div class="card bg-dark">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title eduname"><i class="fa fa-user-graduate me-2"></i>${college_name}</h4>
                                <div class="float-end m-auto text-end">
                                    <span class="cursor-pointer" data-edu-id="${resp.id}" onclick="educationEdit(this)"><i class="fa fa-pencil"></i></span>
                                    <span><i class="fa fa-trash-alt"></i></span>
                                </div>
                            </div>
                            <p class="card-text education_posi">
                                <span class="dg_title">${degree_title}</span>
                                <span class="dg_name">${degree_name}</span>
                            </p>
                            <span class="education_detail">
                            <p class="card-text dg_address" data-country="${resp.education.country}" data-state="${resp.education.state}" data-city="${resp.education.city}" data-zipcode="${resp.education.zipcode}"><i class="fa fa-map-marker-alt me-2"></i>${edu_address}</p>
                            </span>
                        </div>
                    </div>`;
            $('.show_education').append(html);
            $('.add_education input').val('');
            $('.add_education').toggleClass('d-none');
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    });
</script>

<script>
    $('button#addworkHistory').click(function() {
        let work_title = $('input[name="work_title"]').val();
        let work_comp_name = $('input[name="work_comp_name"]').val();
        let work_country = $('input[name="work_country"]').val();
        let work_state = $('input[name="work_state"]').val();
        let work_city = $('input[name="work_city"]').val();
        let work_address = $('input[name="work_address"]').val();
        let work_zipcode = $('input[name="work_zipcode"]').val();

        if(work_title == '' || work_title == undefined)
        {
            $('.work_error').html('Enter Title');
            return false;
        }
        if(work_comp_name == '' || work_comp_name == undefined)
        {
            $('.work_error').html('Enter Company Name');
            return false;
        }

        $.ajax({
            url: `{{route('addWorkHistory', Auth::user()->id)}}`,
            type: 'POST',
            headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
            data: {work_title: work_title, work_comp_name: work_comp_name, work_country: work_country, work_state: work_state, work_city, work_city, work_address: work_address, work_zipcode: work_zipcode, type: 'workhistory', position: 'employee'},
        })
        .done(function(resp) {
         
            let html = `<div class="card bg-dark">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title eduname"><i class="fa fa-user-hard-hat me-2"></i>${work_comp_name}</h4>
                                <div class="float-end m-auto text-end">
                                    <span class="cursor-pointer" data-edu-id="${resp.workId}" onclick="workHistoryEdit(this)"><i class="fa fa-pencil"></i></span>
                                    <span><i class="fa fa-trash-alt"></i></span>
                                </div>
                            </div>
                            <p class="card-text education_posi">
                                <span class="dg_title">${work_title}</span>
                            </p>
                            <span class="education_detail">
                            <p class="card-text dg_address" data-country="${resp.workHistory.country}" data-state="${resp.workHistory.state}" data-city="${resp.workHistory.city}" data-zipcode="${resp.workHistory.zipcode}"><i class="fa fa-map-marker-alt me-2"></i>${work_address}</p>
                            </span>
                        </div>
                    </div>`;
            $('.show_workhistory').append(html);
            $('.add_workhistory input').val('');
            $('.add_workhistory').toggleClass('d-none');
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    });

    function workHistoryEdit(data) {

        let eduId = $(data).attr('data-edu-id');
        let parent = $(data).parents('div.card');
        let college_name = $(parent).find('h4.eduname').text();
        let degree_title = $(parent).find('span.dg_title').text();
        let degree_address = $(parent).find('p.dg_address').text();
        let country = $(parent).find('p.dg_address').attr('data-country');
        let state = $(parent).find('p.dg_address').attr('data-state');
        let city = $(parent).find('p.dg_address').attr('data-city');
        let zipcode = $(parent).find('p.dg_address').attr('data-zipcode');
        $(data).parents('div.card').remove();
        
        $('input[name="work_title"]').val(degree_title)
        $('input[name="work_comp_name"]').val(college_name);
        $('input[name="work_country"]').val(country)
        $('input[name="work_state"]').val(state)
        $('input[name="work_city"]').val(city)
        $('input[name="work_address"]').val(degree_address)
        $('input[name="work_zipcode"]').val(zipcode)
        $('#editworkHistory').attr('data-edu-id', eduId)
        $('.add_workhistory').toggleClass('d-none');
        $('#addworkHistory').addClass('d-none')
        $('#editworkHistory').removeClass('d-none')
        // console.log(eduId,college_name,degree_title,degree_name,degree_address);
        // body...
    }

    $('button#editworkHistory').click(function() {
        // alert()
        // console.log($(this).attr('data-edu-id'))
        // return false;
        let work_title = $('input[name="work_title"]').val();
        let work_comp_name = $('input[name="work_comp_name"]').val();
        let work_country = $('input[name="work_country"]').val();
        let work_state = $('input[name="work_state"]').val();
        let work_city = $('input[name="work_city"]').val();
        let work_address = $('input[name="work_address"]').val();
        let work_zipcode = $('input[name="work_zipcode"]').val();

        if(work_title == '' || work_title == undefined)
        {
            $('.error').html('Enter Title');
            return false;
        }
        if(work_comp_name == '' || work_comp_name == undefined)
        {
            $('.error').html('Enter Company Name');
            return false;
        }

        $.ajax({
            url: `update-workHistory/{{Auth::user()->id}}/${$(this).attr('data-edu-id')}`,
            type: 'POST',
            headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
            data: {work_title: work_title, work_comp_name: work_comp_name, work_country: work_country, work_state: work_state, work_city, work_city, work_address: work_address, work_zipcode: work_zipcode, type: 'workhistory', position: 'employee'},
        })
        .done(function(resp) {
            let html = `<div class="card bg-dark">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title eduname"><i class="fa fa-user-graduate me-2"></i>${work_comp_name}</h4>
                                <div class="float-end m-auto text-end">
                                    <span class="cursor-pointer" data-edu-id="${resp.workId}" onclick="workHistoryEdit(this)"><i class="fa fa-pencil"></i></span>
                                    <span><i class="fa fa-trash-alt"></i></span>
                                </div>
                            </div>
                            <p class="card-text education_posi">
                                <span class="dg_title">${work_title}</span>
                            </p>
                            <span class="education_detail">
                            <p class="card-text dg_address" data-country="${resp.workHistory.country}" data-state="${resp.workHistory.state}" data-city="${resp.workHistory.city}" data-zipcode="${resp.workHistory.zipcode}"><i class="fa fa-map-marker-alt me-2"></i>${work_address}</p>
                            </span>
                        </div>
                    </div>`;
            $('.show_workhistory').append(html);
            $('.add_workhistory input').val('');
            $('.add_workhistory').toggleClass('d-none');
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    });
</script>

<script>
    $('button#addSkills').click(function() {
        let skillName = $('input[name="skill_name"]').val();
        if(skillName == '' || skillName == undefined)
        {
            $('.skillError').html('<p class="text-danger">Enter Skill</p>');
            return false;
        }else{
            $('.skillError').html('');
            var check = true;
            let addedSkills = $('ul.skill_box li');
            let added_Skills = $('ul.show_skills li');
            // if(addedSkills.length == 0 && added_Skills.length == 0)
            // {
            //     $('ul.skill_box').append(`<li class="list-group-item"><span>${skillName}</span><i class="fa fa-times-circle cursor-pointer ms-2" onclick="$(this).parent().remove()"></i></li>`);
            //     $('input[name="skill_name"]').val('')

            // }
            $(added_Skills).each((index, value)=>{
                let txt = $(value).html();
                if(skillName.toLowerCase() == txt.toLowerCase())
                {
                    $('.skillError').html('<p class="text-danger">You Can not add Same Skill Twice</p>');
                        check = false;
                    return false;
                }else{check = true;}
            })
            if(check)
            {
                $(addedSkills).each((index, value)=>{
                    let txt = $(value).find('span').html();
                    if(skillName.toLowerCase() == txt.toLowerCase())
                    {
                        $('.skillError').html('<p class="text-danger">You Can not add Same Skill Twice</p>');
                        check = false;
                        return false;
                    }else{check = true;}
                })
            }

            if(check){
            $('ul.skill_box').append(`<li class="list-group-item"><span>${skillName}</span><i class="fa fa-times-circle cursor-pointer ms-2" onclick="$(this).parent().remove()"></i></li>`);
            $('input[name="skill_name"]').val('')
            }
            $('input[name="skill_name"]').focus()
        }
    });

    $('button#submitSkills').click(function() {
        let skills = $('ul.skill_box li');
        if(skills.length == 0)
        {
            $('.skillError').html('<p class="text-danger">Add Skills First</p>');
        }else{
            let skill_obj = [];
            $(skills).each((index, value)=>{
                skill_obj.push($(value).find('span').html());
            })

            $.ajax({
                url: `{{route('addSkills', Auth::user()->id)}}`,
                type: 'POST',
                headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
                data: {skills: skill_obj, position: 'skill', type: 'skills'},
            })
            .done(function(resp) {
                $(resp.skills).each((index, value)=>{
                    let sId = value.id;
                    let sName = value.name;
                    $('ul.show_skills').append(`<li class="list-group-item" data-id="${sId}">${sName}</li>`);
                })

                $('ul.skill_box li').remove();
                $('.add_skills').addClass('d-none')
                console.log(resp);
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
            // console.log(skill_obj);
        }
    });
</script>

<script>
    $('button#addPoliticalPrefrences').click(function() {
        let party = $('input[name="party"]').val();
        let party_desc = $('textarea[name="party_desc"]').val();
        
        if(party == '' || party == undefined)
        {
            $('.pp-error').html('Enter political party');
            return false;
        }
        if(party_desc == '' || party_desc == undefined)
        {
            $('.pp-error').html('Enter Political Party Description');
            return false;
        }

        $.ajax({
            url: `{{route('addPoliticalPreferences', Auth::user()->id)}}`,
            type: 'POST',
            headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
            data: {party: party, party_desc: party_desc, type: 'politicalpreferences', position: 'politicalpreferences'},
        })
        .done(function(resp) {
         
            let html = `<div class="card bg-dark">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title eduname"><i class="fa fa-user-hard-hat me-2"></i>${party}</h4>
                                <div class="float-end m-auto text-end">
                                    <span class="cursor-pointer" data-edu-id="${resp.workId}" onclick="politicalPreferencesEdit(this)"><i class="fa fa-pencil"></i></span>
                                    <span><i class="fa fa-trash-alt"></i></span>
                                </div>
                            </div>
                            <p class="card-text education_posi">
                                <span class="dg_title">${party_desc}</span>
                            </p>
                        </div>
                    </div>`;
            $('.show_political_Preferences').append(html);
            $('.add_political_prefrences input').val('');
            $('.add_political_prefrences textarea').val('');
            $('.add_political_prefrences').toggleClass('d-none');
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    });

    function politicalPreferencesEdit(data) {

        let eduId = $(data).attr('data-edu-id');
        let parent = $(data).parents('div.card');
        let party = $(parent).find('h4.eduname').text();
        let party_desc = $(parent).find('span.dg_title').text();
        $(data).parents('div.card').remove();
        
        $('textarea[name="party_desc"]').val(party_desc);
        $('input[name="party"]').val(party);
        $('#editPoliticalPrefrences').attr('data-edu-id', eduId)
        $('.add_political_prefrences').toggleClass('d-none');
        $('#addPoliticalPrefrences').addClass('d-none')
        $('#editPoliticalPrefrences').removeClass('d-none')
        // console.log(eduId,college_name,degree_title,degree_name,degree_address);
        // body...
    }

    $('button#editPoliticalPrefrences').click(function() {
        // alert()
        // console.log($(this).attr('data-edu-id'))
        // return false;
        let party = $('input[name="party"]').val();
        let party_desc = $('textarea[name="party_desc"]').val();
        
        if(party == '' || party == undefined)
        {
            $('.pp-error').html('Enter political party');
            return false;
        }
        if(party_desc == '' || party_desc == undefined)
        {
            $('.pp-error').html('Enter Political Party Description');
            return false;
        }

        $.ajax({
            url: `update-politicalPreferences/{{Auth::user()->id}}/${$(this).attr('data-edu-id')}`,
            type: 'POST',
            headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
            data: {party: party, party_desc: party_desc, type: 'politicalpreferences', position: 'politicalPreferences'},
        })
        .done(function(resp) {
            let html = `<div class="card bg-dark">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title eduname"><i class="fa fa-user-graduate me-2"></i>${party}</h4>
                                <div class="float-end m-auto text-end">
                                    <span class="cursor-pointer" data-edu-id="${resp.workId}" onclick="workHistoryEdit(this)"><i class="fa fa-pencil"></i></span>
                                    <span><i class="fa fa-trash-alt"></i></span>
                                </div>
                            </div>
                            <p class="card-text education_posi">
                                <span class="dg_title">${party_desc}</span>
                            </p>
                        </div>
                    </div>`;
            $('.show_political_Preferences').append(html);
            $('.add_political_prefrences input').val('');
            $('.add_political_prefrences textarea').val('');
            $('.add_political_prefrences').toggleClass('d-none');
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    });
</script>

@endsection