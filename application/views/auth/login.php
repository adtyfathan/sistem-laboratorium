<div class="d-flex justify-content-center align-items-center vh-100 bg-white">
    <div class="card p-4 border-0 rounded-5 shadow-lg"
        style="width: 100%; max-width: 420px; background-color: #ffffff;">
        <h3 class="text-center mb-4 text-warning">SisLab</h3>
        <form method="post" action="<?= base_url('/auth/login_user') ?>">

            <div class="mb-3">
                <label for="email" class="form-label text-black">Email</label>
                <div class="input-group shadow-sm">
                    <span class="input-group-text bg-warning text-white border-0 rounded-start-pill">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="email" class="form-control border border-warning rounded-end-pill" id="email"
                        name="email" placeholder="Enter your email">
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label text-black">Password</label>
                <div class="input-group shadow-sm">
                    <span class="input-group-text bg-warning text-white border-0 rounded-start-pill">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" class="form-control border border-warning rounded-end-pill" id="password"
                        name="password" placeholder="Enter your password">
                </div>
            </div>

            <button type="submit" class="btn btn-warning w-100 py-2 text-white rounded-4 shadow-sm">
                <i class="bi bi-box-arrow-in-right me-2"></i>Login
            </button>

            <p class="text-center mt-3 text-black">
                Don't have an account?
                <a href="<?= base_url('/auth/register') ?>" class="text-warning text-decoration-none">
                    Register here
                </a>
            </p>
        </form>
    </div>
</div>