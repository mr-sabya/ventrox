<div class="login-box card">
    <div class="card-body">
        <form class="form-horizontal form-material" id="loginform" wire:submit.prevent="login">
            <h3 class="text-center m-b-20">Sign In</h3>

            <!-- Username Field -->
            <div class="form-group">
                <div class="col-xs-12">
                    <input
                        class="form-control @error('email') is-invalid @enderror"
                        type="email"
                        wire:model="email"
                        required
                        placeholder="Email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <div class="col-xs-12">
                    <input
                        class="form-control @error('password') is-invalid @enderror"
                        type="password"
                        wire:model="password"
                        required
                        placeholder="Password">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Remember Me & Forgot Password Links -->
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" wire:model="remember" id="customCheck1">
                            <label class="form-check-label" for="customCheck1">Remember me</label>
                        </div>
                        <div class="ms-auto">
                            <a href="javascript:void(0)" class="text-muted"><i class="fas fa-lock m-r-5"></i> Forgot password?</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <div class="col-xs-12">
                    <button class="btn w-100 btn-lg btn-info btn-rounded text-white" type="submit">Log In</button>
                </div>
            </div>
        </form>
    </div>
</div>