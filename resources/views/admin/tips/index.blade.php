<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pet Tips — PetParade</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{
font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;
background:#f5f7fa;
color:#333;
}

/* NAVBAR */

.shop-navbar{
background:linear-gradient(135deg,#667eea,#764ba2);
color:white;
padding:1.2rem 2rem;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 4px 12px rgba(0,0,0,0.15);
}

.shop-navbar h1{
font-size:1.6rem;
display:flex;
align-items:center;
gap:8px;
}

.shop-navbar a{
color:white;
text-decoration:none;
font-weight:600;
}

/* HERO */

.hero{
background:linear-gradient(135deg,#667eea,#764ba2);
color:white;
text-align:center;
padding:3rem 2rem;
}

.hero h2{
font-size:2.4rem;
margin-bottom:8px;
}

/* CONTAINER */

.container{
max-width:1400px;
margin:auto;
padding:2rem;
}

/* HEADER */

.header-section{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;
}

.btn-add{
background:linear-gradient(135deg,#667eea,#764ba2);
color:white;
padding:8px 16px;
border-radius:8px;
text-decoration:none;
font-weight:600;
display:flex;
gap:6px;
align-items:center;
}

.btn-add:hover{
transform:translateY(-2px);
box-shadow:0 8px 16px rgba(227, 147, 56, 0.4);
}

/* FILTER TABS */

.tab-bar{
display:flex;
gap:10px;
margin-bottom:25px;
}

.tab-btn{
padding:7px 16px;
border-radius:30px;
border:2px solid #ddd;
background:white;
font-weight:600;
text-decoration:none;
color:#555;
}

.tab-btn.active{
background:#667eea;
color:white;
border-color:#667eea;
}

/* GRID LAYOUT */

.tips-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
gap:20px;
}

/* CARD */

.tip-card{
background:white;
border-radius:14px;
box-shadow:0 2px 10px rgba(0,0,0,0.08);
overflow:hidden;
display:flex;
flex-direction:column;
transition:0.2s;
}

.tip-card:hover{
transform:translateY(-4px);
box-shadow:0 8px 24px rgba(0,0,0,0.14);
}

/* CATEGORY COLORS */

.tip-card.nutrition{border-top:4px solid #43a047;}
.tip-card.health{border-top:4px solid #e53935;}
.tip-card.grooming{border-top:4px solid #8e24aa;}
.tip-card.training{border-top:4px solid #f5b027;}
.tip-card.general{border-top:4px solid #fb8c00;}

.tip-card-header{
padding:18px;
display:flex;
gap:12px;
align-items:center;
}

.tip-icon{
width:42px;
height:42px;
border-radius:10px;
display:flex;
align-items:center;
justify-content:center;
font-size:18px;
}

.tip-icon.nutrition{background:#e8f5e9;color:#43a047;}
.tip-icon.health{background:#ffebee;color:#e53935;}
.tip-icon.grooming{background:#f3e5f5;color:#8e24aa;}
.tip-icon.training{background:#e3f2fd;color:#1e88e5;}
.tip-icon.general{background:#fff3e0;color:#fb8c00;}

.tip-category{
font-size:11px;
font-weight:700;
color:#777;
text-transform:uppercase;
}

.tip-title{
font-weight:700;
font-size:16px;
}

.tip-body{
padding:0 18px 18px;
font-size:14px;
color:#555;
line-height:1.6;
flex:1;
}

/* FOOTER */

.tip-footer{
padding:12px 18px;
border-top:1px solid #eee;
display:flex;
justify-content:space-between;
align-items:center;
}

.pet-badge{
font-size:12px;
font-weight:700;
padding:3px 10px;
border-radius:20px;
}

.pet-badge.cat{background:#e3f2fd;color:#1565c0;}
.pet-badge.dog{background:#fff3e0;color:#e65100;}
.pet-badge.both{background:#f3e5f5;color:#6a1b9a;}

.tip-link{
font-size:13px;
text-decoration:none;
font-weight:600;
color:#667eea;
}

/* EMPTY */

.empty-state{
text-align:center;
padding:60px;
color:#aaa;
}

</style>
</head>

<body>

<div class="shop-navbar">
<h1><i class="fas fa-paw"></i> PETPARADE</h1>
<a href="{{ route('shop') }}"><i class="fas fa-store"></i> Shop</a>
</div>

<div class="hero">
<h2><i class="fas fa-lightbulb"></i> Pet Care Tips</h2>
<p>Helpful advice to keep your cats and dogs healthy and happy.</p>
</div>

<div class="container">

<div class="header-section">
<h2>Add Pet Care Tips</h2>

<a href="{{ route('admin.tips.create') }}" class="btn-add">
<i class="fas fa-plus"></i> Add Tips
</a>
</div>

@if(session('success'))
<div style="background:#d4edda;padding:10px;border-radius:8px;margin-bottom:15px;">
{{ session('success') }}
</div>
@endif

<div class="tab-bar">

<a href="{{ route('admin.tips.index') }}"
class="tab-btn {{ !request('filter') ? 'active' : '' }}">
All
</a>

<a href="{{ route('admin.tips.index',['filter'=>'cat']) }}"
class="tab-btn {{ request('filter')=='cat' ? 'active':'' }}">
🐱 Cats
</a>

<a href="{{ route('admin.tips.index',['filter'=>'dog']) }}"
class="tab-btn {{ request('filter')=='dog' ? 'active':'' }}">
🐶 Dogs
</a>

</div>

<div class="tips-grid">

@forelse($tips as $tip)

@php
$cat=strtolower($tip->category ?? 'general');

$iconMap=[
'nutrition'=>'fa-carrot',
'health'=>'fa-heartbeat',
'grooming'=>'fa-cut',
'training'=>'fa-graduation-cap',
'general'=>'fa-star'
];

$icon=$iconMap[$cat] ?? 'fa-star';
@endphp

<div class="tip-card {{ $cat }}">

<div class="tip-card-header">

<div class="tip-icon {{ $cat }}">
<i class="fas {{ $icon }}"></i>
</div>

<div>
<div class="tip-category">{{ ucfirst($cat) }}</div>
<div class="tip-title">{{ $tip->title }}</div>
</div>

</div>

<div class="tip-body">
{{ Str::limit($tip->body,180) }}
</div>

<div class="tip-footer">

@if($tip->pet_type=='cat')
<span class="pet-badge cat">🐱 For Cats</span>

@elseif($tip->pet_type=='dog')
<span class="pet-badge dog">🐶 For Dogs</span>

@else
<span class="pet-badge both">🐾 Cats & Dogs</span>
@endif

<a href="{{ route('admin.tips.edit',$tip->id) }}" class="tip-link">
Edit →
</a>

</div>

</div>

@empty

<div class="empty-state">
<i class="fas fa-lightbulb"></i>
<p>No tips available yet</p>
</div>

@endforelse

</div>

@if($tips->hasPages())
<div style="margin-top:20px;">
{{ $tips->links() }}
</div>
@endif

</div>

</body>
</html>