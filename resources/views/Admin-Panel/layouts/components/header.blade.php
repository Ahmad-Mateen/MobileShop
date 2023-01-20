<style>
    .pro {
        display: flex;
        justify-content: end;
    }
</style>
<nav class="px-3 pro py-2 bg-white rounded shadow-sm">
    <div class="dropdown text-right">
        <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img class="navbar-profile-image"
            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
            alt="Image">
            <span class="me-2 d-none d-sm-block">Administrator</span>
            <ul class="dropdown-menu" aria-labelledby="dropdown">
                <li><a class="dropdown-item " href="#"
                        onclick="document.querySelector('#logout-form').submit();">Logout</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
            </ul>
        </div>
    </div>
  
</nav>