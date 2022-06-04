            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Zysk miesięczny na przestrzeni lat</h3>

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
                  <canvas id="month_income" width="200" height="80px"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
<!-- Page specific script -->
<script>
 
  let ajax2022 = NaN;
  $.ajax({
    async: false,
    type: 'get',
    url: 'ajax_load/charts.php',
    dataType:"json",
    data: { data: '2022', operation: 'year_income' },
    success: function(data) {
      ajax2022 = data;
    }
  });
  
  for (let i = 1; i <= 12; i++) {
    if (ajax2022[i]==0) {
      ajax2022[i]=NaN;
    }
  };

  const month_income_ctx = document.getElementById('month_income').getContext('2d');
  const month_income = new Chart(month_income_ctx, {
    type: 'line',
    data: {
      labels: ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'],
      datasets: [{
        label: '2021',
        data: [NaN, NaN, NaN, 12551, 11203, 14590, 11527, 12336, 13093, 10397, 8518, 12165],
        borderColor: 'rgba(0, 255, 0, 0.2)',
        backgroundColor: 'rgba(0, 255, 0, 0.1)'
      }, {
        label: '2022',
        data: [ajax2022[1], ajax2022[2], ajax2022[3], ajax2022[4], ajax2022[5], ajax2022[6], ajax2022[7], ajax2022[8], ajax2022[9], ajax2022[10], ajax2022[11], ajax2022[12]],
        borderColor: 'rgba(0, 255, 0, 0.5)',
        backgroundColor: 'rgba(0, 255, 0, 0.4)'
      }],
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