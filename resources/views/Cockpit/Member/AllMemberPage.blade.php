@extends('Cockpit.Layout.MainLayout')

@section('content')
<div class="main-panel"> 
    <div class="content-wrapper">
                <!-- Start Page Content -->
                 <div class="form-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search Here" />
                </div>
                <div class="row allmem">
                    
                </div>    
                <!---<i style="color:green;" class="fa fa-check fa-2x"></i>-->
      
@endsection
@section('script')

 <script>
    $(document).ready(function(){

    fetch_member_data();

    function fetch_member_data(query = '')
    {
        $.ajax({
            url:"{{ route('member.ShowAllMember') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $(".allmem").html(data.card_data);
            }
        })
    }

    $(document).on('keyup', '#search', function(){
        var query = $(this).val();
        fetch_member_data(query);
 });
});
</script>


@endsection