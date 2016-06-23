@if (!Auth::check())
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <h3>Sign in</h3>
            <form class="form-vertical" action="{{ route('signin')}}" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-raised btn-primary">Sign in</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
        <div class="col-md-4 col-md-offset-1">
            <h3>Create an account</h3>
            <form class="form-vertical" action="{{ route('signup') }}" method="post">
                <div class="form-group {{ $errors->has('username') ? ' has-error' : ''}}">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ Request::old('username') ? : '' }}">
                    @if ($errors->has('username'))
                        <span class="help-block">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : ''}}">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ Request::old('email') ? : '' }}">
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : ''}}">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password-confirmation') ? ' has-error' : ''}}">
                    <label for="password-confirmation">Confirm Password</label>
                    <input type="password" name="password-confirmation" id="password-confirmation" class="form-control">
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-raised btn-primary">Sign up</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@endif
