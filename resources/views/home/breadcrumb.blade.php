<ol class="breadcrumb">
    @if ($currentRoute === 'home')
        <li class="active">Select Age Group</li>
    @else
        <li><a href="{{ route('home') }}">Select Age Group</a></li>
    @endif
    @if ($currentRoute === 'home.focus')
        <li class="active">Select a Focus</li>
    @else
        @if (isset($ageGroup))
            <li><a href="{{ route('home.focus', $ageGroup) }}">Select a Focus</a></li>
        @else
            <li>Select a Focus</li>
        @endif
    @endif
    @if ($currentRoute === 'home.principle')
        <li class="active">Select Principle</li>
    @else
        @if (isset($ageGroup) && isset($focus))
            <li><a href="{{ route('home.principle', [$ageGroup, $focus]) }}">Select Principle</a></li>
        @else
            <li>Select Principle</li>
        @endif
    @endif
    @if ($currentRoute === 'home.plan')
        <li class="active">View Your Practice Plan</li>
    @else
        <li>View Your Practice Plan</li>
    @endif
</ol>
