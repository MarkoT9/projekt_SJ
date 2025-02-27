<footer class="row tm-mt-small">
    <div class="col-12 font-weight-light">
        <p class="d-inline-block tm-bg-black text-white py-2 px-4">
            Copyright &copy; 2018 Admin Dashboard . Created by
            <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>
        </p>
    </div>
</footer>
<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="js/moment.min.js"></script>
<!-- https://momentjs.com/ -->
<script src="js/utils.js"></script>
<script src="js/Chart.min.js"></script>
<!-- http://www.chartjs.org/docs/latest/ -->
<script src="js/fullcalendar.min.js"></script>
<!-- https://fullcalendar.io/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
<script src="js/tooplate-scripts.js"></script>
<script>
    let ctxLine,
        ctxBar,
        ctxPie,
        optionsLine,
        optionsBar,
        optionsPie,
        configLine,
        configBar,
        configPie,
        lineChart;
    barChart, pieChart;
    // DOM is ready
    $(function () {
        updateChartOptions();
        drawLineChart(); // Line Chart
        drawBarChart(); // Bar Chart
        drawPieChart(); // Pie Chart
        drawCalendar(); // Calendar

        $(window).resize(function () {
            updateChartOptions();
            updateLineChart();
            updateBarChart();
            reloadPage();
        });
    })
</script>