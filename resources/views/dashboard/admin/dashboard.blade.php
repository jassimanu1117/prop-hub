@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<!-- Property Portal - Super Admin Dashboard (Static Values) -->

<div class="container-fluid py-4">
    <!-- Admin Dashboard -->
   <h4 class="fw-bold mb-4 text-dark">
    <i class="bi bi-speedometer2 me-2"></i> Admin Dashboard
  </h4>
   <h5 class="mb-3 ps-2 border-start border-3 border-primary text-muted fw-semibold small">
    Property Overview
</h5>

    <div class="row g-3 mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <div class="text-muted small">Categories</div>
                    <h4 class="fw-bold text-primary mb-0">4</h4>
                    <a href="#" class="btn btn-outline-dark">
                        View
                    </a>



                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <div class="text-muted small">Active Properties</div>
                    <h4 class="fw-bold text-info mb-0">6</h4>
                    <a href="#" class="btn btn-outline-dark">
                        View
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <div class="text-muted small">Pending Approval</div>
                    <h4 class="fw-bold text-success mb-0">10 </h4>
                    <a href="#" class="btn btn-outline-dark">
                        View
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <div class="text-muted small">Featured Listings</div>
                    <h4 class="fw-bold text-warning mb-0">20</h4>
                    <a href="#" class="btn btn-outline-dark">
                        View
                    </a>
                </div>
            </div>
        </div>


       

    <!-- Second Row -->
 <h5 class="mb-3 ps-2 border-start border-3 border-primary text-muted fw-semibold small">
    Structure & Inventory
</h5>
    <div class="row g-3 mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <div class="text-muted small">Badges</div>
                    <h4 class="fw-bold text-primary mb-0">5</h4>
                     <a href="#" class="btn btn-outline-dark">
                        View
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <div class="text-muted small">Attributes</div>
                    <h4 class="fw-bold text-info mb-0">12</h4>
                    <a href="#" class="btn btn-outline-dark">
                        View
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <div class="text-muted small">Amenities</div>
                    <h4 class="fw-bold text-success mb-0">10 </h4>
                    <a href="#" class="btn btn-outline-dark">
                        View
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <div class="text-muted small">Total Leads</div>
                    <h4 class="fw-bold text-warning mb-0">20</h4>
                    <a href="#" class="btn btn-outline-dark">
                        View
                    </a>
                </div>
            </div>
</div>
    <!-- Third Row -->
<h5 class="mb-3 ps-2 border-start border-3 border-primary text-muted fw-semibold small">
    Lead & Agent Insights
</h5>   
    <div class="row g-3 mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <div class="text-muted small">New Leads Today</div>
                    <h4 class="fw-bold text-primary mb-0">5</h4>
                    <a href="#" class="btn btn-outline-dark">
                        View
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <div class="text-muted small">Total Agents</div>
                    <h4 class="fw-bold text-info mb-0">12</h4>
                    <a href="#" class="btn btn-outline-dark">
                        View
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <div class="text-muted small">Active Agents</div>
                    <h4 class="fw-bold text-success mb-0">10 </h4>
                    <a href="#" class="btn btn-outline-dark">
                        View
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <div class="text-muted small">Inactive Agents</div>
                    <h4 class="fw-bold text-warning mb-0">20</h4>
                    <a href="#" class="btn btn-outline-dark">
                        View
                    </a>
                </div>
            </div>
</div>

    <!-- Fourth Row -->
<h5 class="mb-3 ps-2 border-start border-3 border-primary text-muted fw-semibold small">
    Location & System Overview
</h5>    
    <div class="row g-3 mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <div class="text-muted small">Cities</div>
                    <h4 class="fw-bold text-primary mb-0">5</h4>
                    <a href="#" class="btn btn-outline-dark">
                        View
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <div class="text-muted small">Areas / Localities</div>
                    <h4 class="fw-bold text-info mb-0">12</h4>
                    <a href="#" class="btn btn-outline-dark">
                        View
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <div class="text-muted small">Banners</div>
                    <h4 class="fw-bold text-success mb-0">10 </h4>
                    <a href="#" class="btn btn-outline-dark">
                        View
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <div class="text-muted small">System Users</div>
                    <h4 class="fw-bold text-warning mb-0">20</h4>
                    <a href="#" class="btn btn-outline-dark">
                        View
                    </a>
                </div>
            </div>
</div>


</div>

<!-- Quick Links Section -->
<div class="card p-4 shadow-sm border-0 mb-4">
    <h5 class="fw-semibold mb-3">⚡ Quick Actions</h5>

    <div class="d-flex flex-wrap gap-2">

        <!-- Property -->
        <a href="#" class="btn btn-primary rounded-pill px-3">
            <i class="bi bi-building-add me-1"></i>Add Property
        </a>

        <a href="#" class="btn btn-outline-primary rounded-pill px-3">
            <i class="bi bi-building me-1"></i>All Properties
        </a>

        <a href="#" class="btn btn-info rounded-pill px-3">
            <i class="bi bi-stars me-1"></i>Add Featured Property
        </a>

        <!-- Categories -->
        <a href="#" class="btn btn-info rounded-pill px-3">
            <i class="bi bi-grid me-1"></i>Add Category
        </a>

        <a href="#" class="btn btn-outline-info rounded-pill px-3">
            <i class="bi bi-table me-1"></i>Manage Categories
        </a>

        <!-- Amenities -->
        <a href="#" class="btn btn-success rounded-pill px-3">
            <i class="bi bi-gear me-1"></i>Add Amenity
        </a>

        <a href="#" class="btn btn-outline-success rounded-pill px-3">
            <i class="bi bi-ui-checks-grid me-1"></i>Manage Amenities
        </a>

        <!-- Attributes -->
        <a href="#" class="btn btn-secondary rounded-pill px-3">
            <i class="bi bi-sliders me-1"></i>Add Attribute
        </a>

        <a href="#" class="btn btn-outline-secondary rounded-pill px-3">
            <i class="bi bi-list-check me-1"></i>Manage Attributes
        </a>

        <!-- Leads -->
        <a href="#" class="btn btn-dark rounded-pill px-3">
            <i class="bi bi-people me-1"></i>View Leads
        </a>

        <a href="#" class="btn btn-outline-dark rounded-pill px-3">
            <i class="bi bi-telephone-inbound me-1"></i>Today's Leads
        </a>

        <!-- Agents -->
        <a href="#" class="btn btn-warning rounded-pill px-3 text-white">
            <i class="bi bi-person-plus me-1"></i>Add Agent
        </a>

        <a href="#" class="btn btn-outline-warning rounded-pill px-3">
            <i class="bi bi-people-fill me-1"></i>Manage Agents
        </a>

        <a href="#" class="btn btn-warning rounded-pill px-3 text-white">
            <i class="bi bi-person-check me-1"></i>Verify Agents
        </a>

        <!-- Location -->
        <a href="#" class="btn btn-primary rounded-pill px-3">
            <i class="bi bi-geo-alt me-1"></i>Add City
        </a>

        <a href="#" class="btn btn-outline-primary rounded-pill px-3">
            <i class="bi bi-map me-1"></i>Add Area
        </a>

        <!-- Banners -->
        <a href="#" class="btn btn-danger rounded-pill px-3">
            <i class="bi bi-image me-1"></i>Add Banner
        </a>

        <a href="#" class="btn btn-outline-danger rounded-pill px-3">
            <i class="bi bi-images me-1"></i>Manage Banners
        </a>

        <!-- Enquiries -->
        <a href="#" class="btn btn-dark rounded-pill px-3">
            <i class="bi bi-chat-left-dots me-1"></i>Enquiries
        </a>

        <!-- Reports -->
        <a href="#" class="btn btn-success rounded-pill px-3">
            <i class="bi bi-graph-up-arrow me-1"></i>Property Reports
        </a>

        <a href="#" class="btn btn-outline-success rounded-pill px-3">
            <i class="bi bi-bar-chart-line me-1"></i>Lead Analytics
        </a>

        <!-- Settings -->
        <a href="#" class="btn btn-secondary rounded-pill px-3">
            <i class="bi bi-gear-wide-connected me-1"></i>Site Settings
        </a>

    </div>
</div>


<!-- Agents Overview Section -->
<div class="row mt-4">
    <div class="col-12 mb-2">
        <h5 class="fw-semibold mb-3 text-muted">Agents Overview</h5>
    </div>

    <!-- Total Agents -->
    <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-0 p-3 text-center">
            <small class="fw-semibold d-block">Total Agents</small>
            <span class="text-muted small d-block">45 Registered</span>
            <div class="small text-success mt-1">37 Active</div>
            <!-- View All Agents -->
            <a href="{{-- {{ route('admin.agents.index') }} --}}" class="view-icon mt-2 d-inline-block" title="View All Agents">
                <i class="bi bi-eye"></i>
            </a>
        </div>
    </div>

    <!-- New Registrations -->
    <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-0 p-3 text-center">
            <small class="fw-semibold d-block">New This Week</small>
            <span class="text-muted small d-block">5 Joined</span>
            <div class="small text-primary mt-1">+12% Growth</div>
            <!-- View New Agents -->
            <a href="{{-- {{ route('admin.agents.new') }} --}}" class="view-icon mt-2 d-inline-block" title="View New Agents">
                <i class="bi bi-eye"></i>
            </a>
        </div>
    </div>

    <!-- Pending KYC -->
    <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-0 p-3 text-center">
            <small class="fw-semibold d-block">Pending KYC</small>
            <span class="text-muted small d-block">3 Agents</span>
            <div class="small text-warning mt-1">Needs Approval</div>
            <!-- View Pending KYC -->
            <a href="{{-- {{ route('admin.agents.pending') }} --}}
" class="view-icon mt-2 d-inline-block" title="View Pending KYC">
                <i class="bi bi-eye"></i>
            </a>
        </div>
    </div>

    <!-- Inactive Agents -->
    <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-0 p-3 text-center">
            <small class="fw-semibold d-block">Inactive Agents</small>
            <span class="text-muted small d-block">8 Not Active</span>
            <div class="small text-danger mt-1">Action Needed</div>
            <!-- View Inactive Agents -->
            <a href="{{-- {{ route('admin.agents.inactive') }} --}}" class="view-icon mt-2 d-inline-block" title="View Inactive Agents">
                <i class="bi bi-eye"></i>
            </a>
        </div>
    </div>
</div>


<!-- Top Agents Section -->
<div class="row mt-4">
    <div class="col-12">
        <h6 class="fw-semibold mb-3 text-muted">Top Performing Agents</h6>
    </div>

    <!-- Agent 1 -->
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm border-0 p-3">
            <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/45" class="rounded-circle me-3" alt="">
                <div>
                    <small class="fw-semibold">Raj Properties</small>
                    <div class="small text-success">Verified ✔</div>
                    <div class="small text-muted">42 Leads • 11 Closings</div>
                </div>
            </div>
            <div class="progress mt-2" style="height: 5px;">
                <div class="progress-bar bg-success" style="width: 85%"></div>
            </div>
        </div>
    </div>

    <!-- Agent 2 -->
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm border-0 p-3">
            <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/45" class="rounded-circle me-3" alt="">
                <div>
                    <small class="fw-semibold">Metro Estates</small>
                    <div class="small text-warning">Pending Verification</div>
                    <div class="small text-muted">36 Leads • 7 Closings</div>
                </div>
            </div>
            <div class="progress mt-2" style="height: 5px;">
                <div class="progress-bar bg-primary" style="width: 70%"></div>
            </div>
        </div>
    </div>

    <!-- Agent 3 -->
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm border-0 p-3">
            <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/45" class="rounded-circle me-3" alt="">
                <div>
                    <small class="fw-semibold">Sharma Realty</small>
                    <div class="small text-success">Verified ✔</div>
                    <div class="small text-muted">28 Leads • 9 Closings</div>
                </div>
            </div>
            <div class="progress mt-2" style="height: 5px;">
                <div class="progress-bar bg-info" style="width: 60%"></div>
            </div>
        </div>
    </div>
</div>




<!-- New Feature Section -->
<h5 class="fw-semibold text-muted mb-3 mt-4">System Intelligence</h5>
<div class="row mt-2">

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 rounded-4 p-3 text-center">
            <small class="fw-semibold d-block">Most Active City</small>
            <span class="text-muted small">Ludhiana</span>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 rounded-4 p-3 text-center">
            <small class="fw-semibold d-block">Top Property Type</small>
            <span class="text-muted small">3 BHK Apartments</span>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 rounded-4 p-3 text-center">
            <small class="fw-semibold d-block">Most Viewed Location</small>
            <span class="text-muted small">Mohali Sector 79</span>
        </div>
    </div>

</div>



@endsection

@push('scripts')
<script>
$(document).ready(function() {
   @if($recentOrders->count() > 0)  
    $('#recentOrdersTable').DataTable({
        paging: true,
        searching: true,
        info: false,
        lengthChange: false,
        pageLength: 10,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search orders..."
        }
    });
  @endif  
});
</script>
@endpush
