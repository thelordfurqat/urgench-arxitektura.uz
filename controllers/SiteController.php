<?php

namespace app\controllers;

use app\models\Category;
use app\models\News;
use app\models\Page;
use app\models\Vote;
use app\models\VoteAns;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $article = News::find()->andWhere(['status'=>1])->orderBy(['created'=>SORT_DESC])->limit(10)->all();
        $newssingle = News::find()->andWhere(['status'=>1])->andWhere(['cat_id'=>22])->orderBy(['created'=>SORT_DESC])->offset(10)->limit(1)->one();
        $slide = News::find()->where(['status'=>1])->andWhere(['cat_id'=>22])->orderBy(['created'=>SORT_DESC])->limit(5)->all();
        $news1 = News::find()->andWhere(['status'=>1])->andWhere(['cat_id'=>22])->offset(11)->orderBy(['created'=>SORT_DESC])->limit(3)->all();
        $news2 = News::find()->andWhere(['status'=>1])->andWhere(['cat_id'=>22])->offset(14)->orderBy(['created'=>SORT_DESC])->limit(3)->all();
        $news3 = News::find()->andWhere(['status'=>1])->andWhere(['cat_id'=>23])->orderBy(['created'=>SORT_DESC])->limit(10)->all();

        return $this->render('index',[
            'slide'=>$slide,
            'news1'=>$news1,
            'news2'=>$news2,
            'news3'=>$news3,
            'newssingle'=>$newssingle,
            'article'=>$article,
            'title'=>'Янгибозор тумани ҳокимлиги расмий веб сайти'
        ]);
    }


    public function actionSearch($s = null){

        $name = "Қидирув натижалари";
        $code = '11';
        if($s == null){
            $code = "desc";
        }
        $model = null;
        switch ($code){
            case 'desc': $model = News::find()->where(['status'=>1])->orderBy(['created'=>SORT_DESC]); break;
            default :
                {
                    $code = 'search';
                    $model = News::find()
                        ->andFilterWhere([
                            'or',
                            ['like', 'name', $s],
                            ['like', 'preview', $s],
                            ['like', 'detail', $s],
                        ]);
                    ;
                }
        }

        $countQuery = clone $model;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize' => 10]);
        $models = $model->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('news', [
            'model' => $models,
            'pages' => $pages,
            'code'=>$s,
            'name'=>$name,
        ]);
    }


    public function actionNews($code = null){



        if($code == null){
            $code = "desc";
            $name = "Барча хабарлар";
        }
        $model = null;
        switch ($code){
           case 'desc' : $model = News::find()->where(['status'=>1])->where(['>','id',3])->orderBy(['created'=>SORT_DESC]);break;
            default :
                {
                    if($cat_id = Category::findOne(['code'=>$code])){

                    $code = $cat_id->code;
                    $name = $cat_id->name;
                    $cat_id = $cat_id->id;
                    $model = News::find()->where(['status' => 1])->andWhere(['cat_id'=>$cat_id])->orderBy(['created' => SORT_DESC]);

                    }else{
                        $model = false;
                    }
                }
        }

        if(!$model){
            throw new NotFoundHttpException();
        }
        $countQuery = clone $model;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize' => 10]);
        $models = $model->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        if($model->count()==0){
                throw new NotFoundHttpException();
        }
        if($code=='raxbariyat' || $code=='tarmoq-bolimlar-boshliqlari' || $code=='hududiy-bolimlar-boshliqlari') {
            return $this->render('raxbariyat-index', [
                'model' => $models,
                'pages' => $pages,
                'code'=>$code,
                'name'=>$name,
            ]);
        }

        return $this->render('news', [
            'model' => $models,
            'pages' => $pages,
            'code'=>$code,
            'name'=>$name,
        ]);
    }

    public function actionPage($code = null){
        if($code == null){
            throw new NotFoundHttpException();
        }

        $c = Category::findOne(['code'=>$code]);
        if($m = News::findOne(['cat_id'=>$c->id])){
            return $this->render('page',[
                'model'=>$m,
                'code'=>$code
            ]);
        }else{
            throw new NotFoundHttpException();
        }


    }

    public function actionSitemap(){


        return $this->render('sitemap');

    }

    public function actionView($code){
        if($code == null){
            throw new NotFoundHttpException();
        }

        if($model = News::findOne(['code'=>$code])){
            $model->show_counter ++;
            $model->save();
            return $this->render('view',[
                'model'=>$model,
                'code'=>$code
            ]);
        }else{
            throw new NotFoundHttpException();
        }

    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }



    public function actionVoteresult($id, $result){
        $res = $result;
        if($id == 0 or $res == 0){
            echo "xatolik11";
        }else{
            Yii::$app->session->set('votestatus',true);
            if($model = Vote::findOne($id)){
                if(strlen($model->result) == 0){

                    $r = explode(';',$model->answer);
                    $n = 0;
                    $t = [];
                    foreach ($r as $item) {
                        if(strlen($item)==0){
                            continue;
                        }
                        $n++;
                        $t[$n] = 0;
                    }
                    $model->result = json_encode($t);

                }
                $r = json_decode($model->result,true);

                $r[intval($res)] = intval($r[intval($res)])+1;
                $model->result = json_encode($r);
                $model->save();
                $t = explode(';',$model->answer);
                foreach ($r as $key=>$item){
                   echo "<li class='cat-item'>{$t[$key-1]} - $item</li>";
                }
            }else{
                echo "xatolik22";
            }
        }
    }

}
