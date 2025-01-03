<div class="container" id="schedule">
    <h1>　</h1>
    <h3 class="clB fontWExtr">일정안내</h3>
    <div>
        <?php
            $currYear = substr(date("Y-m-d"),0,4);
            $currMonth = substr(date("Y-m-d"),5,2);
            echo '<br><br><div class="fs4 txtCenter"><span class="fs4 cl3" style="font-weight:900;">'.$currYear.'년 약혼자주말 일정</span></div><br>';
            $sql = "
            SELECT * FROM EDU_FAMILY.EDU_CLASS WHERE GRP_CD = 'WEEK_END' AND EDU_DT >= '".$currYear."-01-01' AND EDU_DT <= '".$currYear."-12-31';
            ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $preMonth='00';
                while($row = mysqli_fetch_assoc($result)){
                    $thisMonth = substr($row['EDU_DT'],5,2);
                    if($preMonth!=$thisMonth){
                        if($preMonth!='00'){echo '</div>';}
                        echo '<div class="pddM clBg5 rndCorner txtCenter scheduleBox"><span class="fs5 cl3 fontWBold">&nbsp; '.$row['TEAM_CNT'].'차　　</span>';
                        $preMonth=$thisMonth;
                    }else{
                        echo '<span class="fs5">&nbsp; / &nbsp;</span>';
                    }
                    echo '<span class="fs5" style="color:';
                    if($row['ONLINE']==0){echo '#777;">';}else{echo '#E55;">';}
                    echo substr($row['EDU_DT'],5,2).".".substr($row['EDU_DT'],8,2);

                    echo " ~ ";
                    $endDt = date("Y-m-d", strtotime($row['EDU_DT']." +2 days"));
                    echo substr($endDt,5,2).".".substr($endDt,8,2);
                }
                echo '</div>    <div class="clearB"></div>';
            }
            if($currMonth == '11'||$currMonth == '12'){
                echo '<br><br><div class="fs4 txtCenter"><span class="fs4 cl3" style="font-weight:900;">'.($currYear+1).'년 약혼자주말 일정</span></div><br>';
                $sql = "
                SELECT * FROM EDU_FAMILY.EDU_CLASS WHERE GRP_CD = 'WEEK_END' AND EDU_DT >= '".($currYear+1)."-01-01' AND EDU_DT <= '".($currYear+1)."-12-31';
                ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $preMonth='00';
                    while($row = mysqli_fetch_assoc($result)){
                        $thisMonth = substr($row['EDU_DT'],5,2);
                        if($preMonth!=$thisMonth){
                            if($preMonth!='00'){echo '</div>';}
                            echo '<div class="pddM clBg5 rndCorner txtCenter scheduleBox"><span class="fs5 cl3 fontWBold">&nbsp; '.$row['TEAM_CNT'].'차　　</span>';
                            $preMonth=$thisMonth;
                        }else{
                            echo '<span class="fs5">&nbsp; / &nbsp;</span>';
                        }
                        echo '<span class="fs5" style="color:';
                        if($row['ONLINE']==0){echo '#777;">';}else{echo '#E55;">';}
                        echo substr($row['EDU_DT'],5,2).".".substr($row['EDU_DT'],8,2);
    
                        echo " ~ ";
                        $endDt = date("Y-m-d", strtotime($row['EDU_DT']." +2 days"));
                        echo substr($endDt,5,2).".".substr($endDt,8,2);
                    }
                    echo '</div>    <div class="clearB"></div>';
                }
            }
        ?>
    </div>
</div>

<link href="/assets/css/schedule.css?ver=0.01" rel="stylesheet" />