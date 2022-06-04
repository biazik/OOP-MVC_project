            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Różnica w porównaniu do ubiegłego roku</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body"> 
                <div class="chart">
                  <canvas id="chart_summary_2021" width="200" height="80px"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
<!-- Page specific script -->
<script>

let showOnChart = [];
let lastYearIncome = [NaN, 0, 0, 0, 12551, 11203, 14590, 11527, 12336, 13093, 10397, 8518, 12165];

  let ajaxDiffrence = 0;
  $.ajax({
    async: false,
    type: 'get',
    url: 'ajax_load/charts.php',
    dataType:"json",
    data: { data: '2022', operation: 'year_income' },
    success: function(data) {
      ajaxDiffrence = data;
    }
  });
  
  for (let i = 1; i <= 12; i++) {
    if (ajaxDiffrence[i]==0 || lastYearIncome[i]==0) {
      showOnChart[i]=0;
    }
    else{
      showOnChart[i] = ajaxDiffrence[i]*100/lastYearIncome[i];
      showOnChart[i] = Math.round(showOnChart[i]);
      showOnChart[i] = showOnChart[i]-100;
    }
  };
  
const chart_summary_2021_ctx = document.getElementById('chart_summary_2021').getContext('2d');
const chart_summary_2021 = new Chart(chart_summary_2021_ctx, {
    type: 'bar',
    data: {
        labels: ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'],
        datasets: [{    
            label: 'Różnica zysków',
            data: [showOnChart[1], showOnChart[2], showOnChart[3], showOnChart[4], showOnChart[5], showOnChart[6], showOnChart[7], showOnChart[8], showOnChart[9], showOnChart[10], showOnChart[11], showOnChart[12]],
            // data: [NaN, NaN, NaN, 39984, 34375, 43410, 33290, 35500, 31150, 30485, 22353, 35770],
            backgroundColor: 'rgba(255, 255, 0, 0.3)',
            
        },],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>