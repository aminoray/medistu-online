<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherDetail extends Model
{
  public $timestamps = false;

  protected $fillable = ['teacher_id',
                         'full_name',
                         'name_kana',
                         'prefecture',
                         'college_name',
                         'department',
                         'major',
                         'grade',
                         'subject_id_1',
                         'subject_id_2',
                         'subject_id_3',
                         'subject_id_4',
                         'subject_id_5',
                         'subject_id_6',
                         'subject_id_7',
                         'subject_id_8',
                         'subject_id_9',
                         'subject_id_10',
                         'subject_id_11',
                         'subject_id_12',
                         'subject_id_13',
                         'subject_id_14',
                         'subject_id_15',
                         'subject_id_16',
                         'subject_id_17',
                         'subject_id_18',
                         'subject_id_19',
                         'subject_id_20',
                         'subject_id_21',
                         'subject_id_22',
                         'zoom_url',
                       ];

   Public function user()
      {
          return $this->belongsTo(User::class);
      }

}

//
// ID　科目　対応表
// App\Subject {#4149
// id: "1",
// name: "国語",
// grade_id: "7",
// },
// App\Subject {#4150
// id: "2",
// name: "数学",
// grade_id: "2",
// },
// App\Subject {#4151
// id: "3",
// name: "英語",
// grade_id: "7",
// },
// App\Subject {#4152
// id: "4",
// name: "理科",
// grade_id: "6",
// },
// App\Subject {#4153
// id: "5",
// name: "社会",
// grade_id: "6",
// },
// App\Subject {#4154
// id: "6",
// name: "算数",
// grade_id: "4",
// },
// App\Subject {#4155
// id: "7",
// name: "数学I",
// grade_id: "1",
// },
// App\Subject {#4156
// id: "8",
// name: "数学II",
// grade_id: "1",
// },
// App\Subject {#4157
// id: "9",
// name: "数学III",
// grade_id: "1",
// },
// App\Subject {#4158
// id: "10",
// name: "数学A",
// grade_id: "1",
// },
// App\Subject {#4159
// id: "11",
// name: "数学B",
// grade_id: "1",
// },
// App\Subject {#4160
// id: "12",
// name: "物理",
// grade_id: "1",
// },
// App\Subject {#4161
// id: "13",
// name: "化学",
// grade_id: "1",
// },
// App\Subject {#4162
// id: "14",
// name: "生物",
// grade_id: "1",
// },
// App\Subject {#4163
// id: "15",
// name: "地学",
// grade_id: "1",
// },
// App\Subject {#4164
// id: "16",
// name: "世界史",
// grade_id: "1",
// },
// App\Subject {#4165
// id: "17",
// name: "日本史",
// grade_id: "1",
// },
// App\Subject {#4166
// id: "18",
// name: "世界史",
// grade_id: "1",
// },
// App\Subject {#4167
// id: "19",
// name: "地理",
// grade_id: "1",
// },
// App\Subject {#4168
// id: "20",
// name: "現代社会",
// grade_id: "1",
// },
// App\Subject {#4169
// id: "21",
// name: "倫理・政治経済",
// grade_id: "1",
// },
// App\Subject {#4170
// id: "22",
// name: "その他",
// grade_id: "7",
// }
