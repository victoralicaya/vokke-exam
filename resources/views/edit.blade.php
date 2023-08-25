@extends('layout.app')

@section('content')
    <div class="container">
        <div>
            <div id="notif">
                <label for="" id="notif-text"></label>
            </div>
            <form>
                <div class="form-container">
                    <div class="group">
                        <label for=""><i class="fas fa-paw"></i> Name</label>
                        <input type="text" name="name" id="name" class="form-input" placeholder="Name" value="{{ $kangaroo->name }}">
                        <label for="" class="input-error" id="name-error"></label>
                    </div>

                    <div class="group">
                        <label for=""><i class="fas fa-paw"></i> Nickname</label>
                        <input type="text" name="nickname" id="nickname" class="form-input" placeholder="Nickname" value="{{ $kangaroo->nickname }}">
                    </div>

                    <div class="group">
                        <label for=""><i class="fas fa-weight-hanging"></i> Weight</label>
                        <input type="number" name="weight" id="weight" class="form-input" placeholder="Weight" value="{{ $kangaroo->weight }}">
                        <label for="" class="input-error" id="weight-error"></label>
                    </div>

                    <div class="group">
                        <label for=""><i class="fas fa-ruler"></i> Height</label>
                        <input type="number" name="height" id="height" class="form-input" placeholder="Height" value="{{ $kangaroo->height }}">
                        <label for="" class="input-error" id="height-error"></label>
                    </div>

                    <div class="group">
                        <label for=""><i class="fas fa-venus-mars"></i> Gender</label>
                        <select name="gender" id="gender" class="form-input">
                            <option value="">Select</option>
                            <option value="male" {{ $kangaroo->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $kangaroo->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                        <label for="" class="input-error" id="gender-error"></label>
                    </div>

                    <div class="group">
                        <label for=""><i class="fas fa-palette"></i> Color</label>
                        <input type="text" name="color" id="color" class="form-input" placeholder="Color" value="{{ $kangaroo->color }}">
                    </div>

                    <div class="group">
                        <label for=""><i class="fas fa-paw"></i> Friendliness</label>
                        <select name="friendliness" id="friendliness" class="form-input">
                            <option value="">Select</option>
                            <option value="friendly" {{ $kangaroo->friendliness == 'friendly' ? 'selected' : '' }}>Friendly</option>
                            <option value="independent" {{ $kangaroo->friendliness == 'independent' ? 'selected' : '' }}>Independent</option>
                        </select>
                    </div>

                    <div class="group">
                        <label for=""><i class="fas fa-paw"></i> Birthday</label>
                        <input type="date" name="birthday" id="birthday" class="form-input" value="{{ $kangaroo->birthday }}">
                        <label for="" class="input-error" id="birthday-error"></label>
                    </div>
                    <input type="hidden" id="kangaroo-id" value="{{ $kangaroo->id }}">
                    <button type="submit" class="btn-submit" id="submit"><i class="fas fa-edit"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
