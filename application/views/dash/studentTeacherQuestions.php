<script>
    $(function () {
        $('#container').highcharts({
            data: {
                table: 'datatable'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Questions Per Subject'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Number of Questions'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        this.point.y + ' ' + this.point.name.toLowerCase();
                }
            }
        });
    });

    $(function () {
        $('#container_topics').highcharts({
            data: {
                table: 'datatable_topics'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Questions Per Topic'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Number of Questions'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        this.point.y + ' ' + this.point.name.toLowerCase();
                }
            }
        });
    });

    $(function () {
        $('#container_gen').highcharts({
            data: {
                table: 'datatable_gen'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Combined Stats'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Number of Questions'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        this.point.y + ' ' + this.point.name.toLowerCase();
                }
            }
        });
    });
</script>

<legend><font class="myColor"><i class="fa fa-dashboard"></i>Student Teacher Questions</font></legend>
<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url() ?>/index.php/dash/dashBoard"><-Back</a>

    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-inline" role="form" method="POST">
            <div class="form-group margin-10">
                <input type="text" class="form-control" id="email" placeholder="Class" name="stat_class"/>
            </div>
            <div class="form-group margin-10">
                <!--<label for="pwd">Password:</label>-->
                <input type="text" class="form-control" id="pwd" placeholder="Year" name="stat_year"/>
            </div>
            <div class="form-group margin-10">
                <!--<label for="pwd">Password:</label>-->
                <input type="text" class="form-control" id="pwd" placeholder="Term" name="stat_term"/>
            </div>
            <div class=" form-group margin-10">
                <input type="submit" class="btn btn-primary" value = "Filter" name="stat_filter_btn"/>
            </div>
        </form>
    </div>

</div>
<div class="row">
    <div class="col-md-12"id="container">

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php
        if(count($quizCount)){

       
        $html = '
                <table class="table table-bordered table-striped table-responsive " id="datatable">
                <thead><tr><th></th>';
        foreach($quizCount as $subject=>$info) {
            foreach($info as $topic=>$count) {
                $html .= '<th>'.$topic.'</th>';
            }
            $mysubject = strtoupper($subject);
        }

        $html .='</tr> </thead>
                <tbody>
                <tr><td>'.$mysubject.'</td>
                ';


        foreach($quizCount as $subject=>$info) {
            foreach($info as $topic=>$count) {
                $html .='<td>'.$count.'</td>';
            }

        }

        $html .='
            </tr>
            </tbody>
                </table>';

        
         }else{
             $html = '<h4>No questions available for the selected criteria</h4>';
         }

         echo $html;
        ?>

    </div>
</div>

