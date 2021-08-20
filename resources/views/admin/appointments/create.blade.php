@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.appointment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.appointments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="patient_id">{{ trans('cruds.appointment.fields.patient') }}</label>
                <select class="form-control select2 {{ $errors->has('patient') ? 'is-invalid' : '' }}" name="patient_id" id="patient_id">
                    @foreach($patients as $id => $entry)
                        <option value="{{ $id }}" {{ old('patient_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('patient'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.patient_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.appointment.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type">
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Appointment::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date">{{ trans('cruds.appointment.fields.date') }}</label>
                <input class="form-control datetime {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}">
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="insurance">{{ trans('cruds.appointment.fields.insurance') }}</label>
                <input class="form-control {{ $errors->has('insurance') ? 'is-invalid' : '' }}" type="text" name="insurance" id="insurance" value="{{ old('insurance', '') }}">
                @if($errors->has('insurance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('insurance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.insurance_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('agree') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="agree" value="0">
                    <input class="form-check-input" type="checkbox" name="agree" id="agree" value="1" {{ old('agree', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="agree">{{ trans('cruds.appointment.fields.agree') }}</label>
                </div>
                @if($errors->has('agree'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agree') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.agree_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection