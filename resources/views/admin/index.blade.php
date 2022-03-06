<x-layout>
<x-admin.navbar></x-admin.navbar>
<section class="admin-content">
    <h3 class="admin__heading">Welcome to Dashboard</h3>


    <div class="admin-card">
        <x-admin.cards name="Heroes" data="{{$hero->count()}}" class="fas fa-home"></x-admin.cards>
        <x-admin.cards name="Projects" data="{{$project->count()}}" class="far fa-file-chart-pie"></x-admin.cards>
        <x-admin.cards name="Skills" data="{{$skill->count()}}" class="fas fa-language"></x-admin.cards>
        <x-admin.cards name="Contact" data="{{$contact->count()}}" class="fas fa-address-book"></x-admin.cards>
        <x-admin.cards name="Footer" data="{{$footer->count()}}" class="fas fa-address-book"></x-admin.cards>
    </div>

    <!-- Chart -->
    <div id="columnchart_material" class="chart"></div>

</section>
</div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Data', 'Items'],
                ["Hero", {{$hero->count()}}],
                ["Projects", {{$project->count()}}],
                ["Contact", {{$contact->count()}}],
                ["Skills", {{$skill->count()}}],
                ['Footer', {{$footer->count()}}]

                // ['Posts', 1000],

            ]);

            var options = {
                chart: {
                    title: 'Activity',
                    subtitle: '',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

</x-layout>
