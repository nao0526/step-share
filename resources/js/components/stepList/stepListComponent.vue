<template>
    <div class="l-row__col12--sm l-row__col06--tab l-row__col06--pc p-step-list__panel-container">
        <a :href="'/steps/' + parentStep.id" class="c-panel p-step-list__panel">
            <div class="c-panel__category p-step-list__category">
                {{ category.name }}
            </div>
            <div class="c-img p-step-list__img">
                <img class="c-img__item--center" :src="showStepImg(parentStep.pic)" alt="">
            </div>
            <div class="l-row l-row--between p-step-list__head">
                <h3 class="c-panel__title p-step-list__title">
                    {{ parentStep.title }}
                </h3>
            </div>
            <div class="l-row l-row--between l-row--center p-step-list__body">
                <p class="p-step-list__time">
                    目安達成時間：{{ showTotalTime(childSteps) }}時間
                </p>
                <p class="p-step-list__sum">
                    全STEP{{ childSteps.length }}
                </p>
            </div>
        </a>
    </div>
</template>

<script>
import Mixin from '../mixins/mixin';
export default {
    props: ['parentStep', 'childSteps', 'category'],
    mixins: [Mixin],
}
</script>

<style>

</style>