@extends('layouts.master')

@section('meta')
  @include('iblog::frontend.partials.post.metas')
@stop

@section('title')
  {{ $post->title }} | @parent
@stop

@section('content')
  <div id="postLayout1" class="page blog single single-{{$category->slug}} single-{{$category->id}}">
    @include('iblog::frontend.partials.breadcrumb')
    <div class="container">
      {{-- article --}}
      <div class="row">
        <div class="col-12 col-md-8">
          <div class="blog-image">
          <x-media::single-image imgClasses="img-fluid"
                                 :mediaFiles="$post->mediaFiles()"
                                 :isMedia="true" :alt="$post->title"/>
          </div>
          <div class="blog-content pb-4">
            <p class="date mt-3 mb-2">{{ $post->created_at->format('d/m/Y')}}</p>
            <h2 class="title">{{ $post->title }}</h2>
            <div class="page-body description mb-4 text-justify">
              {!! $post->description !!}
            </div>
            <div>
              <div class="social-share d-flex justify-content-end align-items-center">
                <div class="mr-2">{{trans('iblog::common.social.share')}}:</div>
                <div class="sharethis-inline-share-buttons"></div>
              </div>
            </div>
          </div>
        </div>
        {{-- Sidebar --}}
        <div class="col-12 col-md-4 pl-md-4">
          <div class="blog-categories">
              <livewire:isite::filters :filters="['categories' => [
                                                                'title' => 'iblog::category.plural',
                                                                'name' => 'categories',
                                                                'typeTitle' => 'titleOfTheConfig',
                                                                'status' => true,
                                                                'isExpanded' => true,
                                                                'type' => 'tree',
                                                                'repository' => 'Modules\Iblog\Repositories\CategoryRepository',
                                                                'entityClass' => 'Modules\Iblog\Entities\Category',
                                                                'params' => ['filter' => ['internal' => false]],
                                                                'emitTo' => 'itemsListGetData',
                                                                'repoAction' => null,
                                                                'repoAttribute' => null,
                                                                'listener' => null,
                                                                'layout' => 'default',
                                                                'classes' => 'col-12'
                                                            ]]"/>

          </div>
          <div class="blog-recent mb-5">
              <h4 class="mb-3">{{trans('iblog::common.layouts.titlePostRecent')}}</h4>
              <livewire:isite::items-list
                moduleName="Iblog"
                itemComponentName="isite::item-list"
                itemComponentNamespace="Modules\Isite\View\Components\ItemList"
                :configLayoutIndex="['default' => 'one',
                                                            'options' => [
                                                                'one' => [
                                                                    'name' => 'one',
                                                                    'class' => 'col-6 col-md-12 my-2',
                                                                    'icon' => 'fa fa-align-justify',
                                                                    'status' => true],
                                                        ],
                                                        ]"
                :itemComponentAttributes="[
                                        'withViewMoreButton'=>false,
                                        'withCategory'=>false,
                                        'withSummary'=>false,
                                        'withCreatedDate'=>true,
                                        'layout'=>'item-list-layout-7',
                                        'imageAspect'=>'4/3',
                                        'imageObject'=>'cover',
                                        'imageBorderRadio'=>'0',
                                        'imageBorderStyle'=>'solid',
                                        'imageBorderWidth'=>'0',
                                        'imageBorderColor'=>'#000000',
                                        'imagePadding'=>'0',
                                        'withTitle'=>true,
                                        'titleAlign'=>'',
                                        'titleTextSize'=>'14',
                                        'titleTextWeight'=>'font-weight-bold',
                                        'titleTextTransform'=>'',
                                        'formatCreatedDate'=>'d.m.Y',
                                        'summaryAlign'=>'text-left',
                                        'summaryTextSize'=>'16',
                                        'summaryTextWeight'=>'font-weight-normal',
                                        'numberCharactersSummary'=>'100',
                                        'categoryAlign'=>'text-left',
                                        'categoryTextSize'=>'18',
                                        'categoryTextWeight'=>'font-weight-normal',
                                        'createdDateAlign'=>'text-left',
                                        'createdDateTextSize'=>'11',
                                        'createdDateTextWeight'=>'font-weight-normal',
                                        'buttonAlign'=>'text-left',
                                        'buttonLayout'=>'rounded',
                                        'buttonIcon'=>'',
                                        'buttonIconLR'=>'left',
                                        'buttonColor'=>'primary',
                                        'viewMoreButtonLabel'=>'isite::common.menu.labelViewMore',
                                        'withImageOpacity'=>false,
                                        'imageOpacityColor'=>'opacity-dark',
                                        'imageOpacityDirection'=>'opacity-all',
                                        'orderClasses'=>[
                                        'photo'=>'order-0',
                                        'title'=>'order-1',
                                        'date'=>'order-4',
                                        'categoryTitle'=>'order-3',
                                        'summary'=>'order-2',
                                        'viewMoreButton'=>'order-5'
                                        ],
                                        'imagePosition'=>'2',
                                        'imagePositionVertical'=>'align-self-star',
                                        'contentPositionVertical'=>'align-self-star',
                                        'contentPadding'=>'0',
                                        'contentBorder'=>'0',
                                        'contentBorderColor'=>'#dddddd',
                                        'contentBorderRounded'=>'0',
                                        'contentMarginInsideX'=>'mx-0',
                                        'contentBorderShadows'=>'none',
                                        'contentBorderShadowsHover'=>'',
                                        'titleColor'=>'text-dark',
                                        'summaryColor'=>'text-dark',
                                        'categoryColor'=>'text-primary',
                                        'createdDateColor'=>'text-dark',
                                        'titleMarginT'=>'mt-2 mt-sm-0',
                                        'titleMarginB'=>'mb-1 mb-md-2',
                                        'summaryMarginT'=>'mt-0',
                                        'summaryMarginB'=>'mb-2',
                                        'categoryMarginT'=>'mt-0',
                                        'categoryMarginB'=>'mb-2',
                                        'categoryOrder'=>'3',
                                        'createdDateMarginT'=>'mt-2',
                                        'createdDateMarginB'=>'mb-0 mb-md-2',
                                        'createdDateOrder'=>'4',
                                        'buttonMarginT'=>'mt-0',
                                        'buttonMarginB'=>'mb-0',
                                        'buttonOrder'=>'5',
                                        'titleLetterSpacing'=>'0',
                                        'summaryLetterSpacing'=>'0',
                                        'categoryLetterSpacing'=>'0',
                                        'createdDateLetterSpacing'=>'0',
                                        'titleVineta'=>'',
                                        'titleVinetaColor'=>'text-dark',
                                        'buttonSize'=>'button-normal',
                                        'buttonTextSize'=>'16',
                                        'itemBackgroundColor'=>'#ffffff',
                                        'itemBackgroundColorHover'=>'#ffffff',
                                        'summaryHeight'=>100,
                                        'numberCharactersTitle'=>50,
                                        'columnLeft'=>'col-sm-5',
                                        'columnRight'=>'col-sm-7 px-0 pr-sm-0 pl-sm-2',
                                        'titleTextSizeMobile'=>'13',
                                            ]"
                entityName="Post"
                :showTitle="false"
                :pagination="['show'=>false]"

                :params="['take'=>4,'filter' => ['category' => $category->id ?? null]]"
                :responsiveTopContent="['mobile'=>false,'desktop'=>false]"
              />
          </div>
        </div>
        <div class="blog-related col-12 pb-5">
          <h4 class="text-center h5 font-weight-bold">{{trans('iblog::common.layouts.titleRelatedPosts')}}</h4>
          <x-isite::carousel.owl-carousel
          id="Articles"
          repository="Modules\Iblog\Repositories\PostRepository"
          :params="['take' => 20,'filter' => ['category' => $category->id]]"
          :margin="25"
          :loops="false"
          :dots="false"
          :navText="['<i class=\'fa fa-chevron-left\'></i>','<i class=\'fa fa fa-chevron-right\'></i>']"
          mediaImage="mainimage"
          :autoplay="false"
          :responsive="[300 => ['items' =>  1],700 => ['items' =>  2], 1024 => ['items' => 3]]"
          :itemComponentAttributes="config('asgard.iblog.config.itemComponentAttributesBlog')"
        />
        </div>
      </div>
    </div>
  </div>
@stop