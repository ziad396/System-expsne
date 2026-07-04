<div class="card border-0 shadow-sm bg-white p-3 h-100">
    <div class="d-flex align-items-center mb-4 px-2">
        <div class="bg-primary-subtle text-primary rounded p-2 me-2">
            🛡️
        </div>
        <h5 class="fw-bold mb-0 text-dark">Admin Controls</h5>
    </div>
    
    <div class="nav flex-column nav-pills" id="adminTabs" role="tablist">
        
           <a href="{{ route('adminpanal') }}" class="btn btn-light text-danger border fw-bold px-4">👥 &nbsp; Manage Users </a>  

      
           <a href="{{ route('expense.manage') }}" class="btn btn-light text-secondary border fw-bold px-4"> 💰 &nbsp; Expense Log</a>
       
    </div>
</div>