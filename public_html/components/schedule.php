<div class="container" id="schedule">
    <h1>　</h1>
    <h3 class="clB fontWExtr">일정안내</h3>
    <h1>　</h1>
    <h5 class="clB fontWSlim" style="color:#E55">※ 빨간색으로 적힌 날짜는 비대면 교육으로 실시</h5>
    <h6>　</h6>
    <!--div class="pddM clBg5 rndCorner txtCenter scheduleBox"><span class="fs5 cl3 fontWBold">&nbsp; 4월　　</span><span class="fs5" style="color:#E55;">14(토요일)  /  <b  class="fs5 fontWSlim" style="color:#777;">28(주　일)</b></span></div-->
    <div>
        <?php
            $currYear = substr(date("Y-m-d"),0,4);
            $currMonth = substr(date("Y-m-d"),5,2);
            echo '<br><br><div class="fs4 txtCenter"><span class="fs4 cl3" style="font-weight:900;">'.$currYear.'년 혼인강좌 일정</span></div><br>';
            $sql = "
            SELECT * FROM EDU_FAMILY.EDU_CLASS WHERE GRP_CD='MRG_EDU' AND EDU_DT >= '".$currYear."-01-01' AND EDU_DT <= '".$currYear."-12-31';
            ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $preMonth='00';
                while($row = mysqli_fetch_assoc($result)){
                    $thisMonth = substr($row['EDU_DT'],5,2);
                    if($preMonth!=$thisMonth){
                        if($preMonth!='00'){echo '</div>';}
                        echo '<div class="pddM clBg5 rndCorner txtCenter scheduleBox"><span class="fs5 cl3 fontWBold">&nbsp; '.$thisMonth.'월　　</span>';
                        $preMonth=$thisMonth;
                    }else{
                        echo '<span class="fs5">&nbsp; / &nbsp;</span>';
                    }
                    echo '<span class="fs5" style="color:';
                    if($row['ONLINE']==0){echo '#777;">';}else{echo '#E55;">';}
                    echo substr($row['EDU_DT'],8,2);
                    if(date('w',strtotime($row['EDU_DT']))==0){
                        echo '(주　일)';
                    }else if(date('w',strtotime($row['EDU_DT']))==6){
                        echo '(토요일)';
                    }else{
                        echo '(평일체크필요!)';
                    }            
                }
                echo '</div>    <div class="clearB"></div>';
            }
            if($currMonth == '11'||$currMonth == '12'){
                echo '<br><br><div class="fs4 txtCenter"><span class="fs4 cl3" style="font-weight:900;">'.($currYear+1).'년 혼인강좌 일정</span></div><br>';
                $sql = "
                SELECT * FROM EDU_FAMILY.EDU_CLASS WHERE GRP_CD='MRG_EDU' AND EDU_DT >= '".($currYear+1)."-01-01' AND EDU_DT <= '".($currYear+1)."-12-31';
                ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $preMonth='00';
                    while($row = mysqli_fetch_assoc($result)){
                        $thisMonth = substr($row['EDU_DT'],5,2);
                        if($preMonth!=$thisMonth){
                            if($preMonth!='00'){echo '</div>';}
                            echo '<div class="pddM clBg5 rndCorner txtCenter scheduleBox"><span class="fs5 cl3 fontWBold">&nbsp; '.$thisMonth.'월　　</span>';
                            $preMonth=$thisMonth;
                        }else{
                            echo '<span class="fs5">&nbsp; / &nbsp;</span>';
                        }
                        echo '<span class="fs5" style="color:';
                        if($row['ONLINE']==0){echo '#777;">';}else{echo '#E55;">';}
                        echo substr($row['EDU_DT'],8,2);
                        if(date('w',strtotime($row['EDU_DT']))==0){
                            echo '(주　일)';
                        }else if(date('w',strtotime($row['EDU_DT']))==6){
                            echo '(토요일)';
                        }else{
                            echo '(평일체크필요!)';
                        }            
                    }
                    echo '</div>    <div class="clearB"></div>';
                }   
            }
        ?>
    </div>
</div>

<link href="/assets/css/schedule.css?ver=0" rel="stylesheet" />