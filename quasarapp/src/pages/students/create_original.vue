<template>
  <div class="q-pa-sm">
  	<h-title>Add New Student</h-title>
  	<div class="row q-ma-sm">
  		<div class="col-3 q-ma-sm">
  			<q-uploader
		        url="http://localhost:4444/upload"
		        color="cyan-7"
		        flat
		        class="full-width"
		        label="Image"
		        bordered
		      />
  		</div>
  		<div class="col">
  			<div class="row">
  				<q-input dense class="col q-mx-sm q-mt-sm" outlined label="Name"/>
  				<q-input dense class="col q-mx-sm q-mt-sm" outlined label="Name"/>
  			</div>
  			<div class="row">
  				<q-input dense class="col q-ma-sm" outlined label="Name"/>
  				<q-input dense class="col q-ma-sm" outlined label="Name"/>
  			</div>
  			<div class="row">
  				<q-input dense class="col q-mx-sm" outlined label="Name"/>
  				<q-input dense class="col q-mx-sm" outlined label="Name"/>
  			</div>

  			<div class="row">
  				<q-input dense class="col q-mx-sm q-mt-sm" outlined label="Name"/>
  				<q-input dense class="col q-mx-sm q-mt-sm" outlined label="Name"/>
  			</div>


  		</div>
  	</div>
  	<div>
  		<q-card>
        <q-tabs
          v-model="tab"
          dense
          inline-label
          class="text-cyan-7 three_d glossy"
          active-color="white"
          content-class="bg-white text-cyan-7"
          indicator-color="white"
          active-bg-color="cyan-7"
          align="justify"
          narrow-indicator
        >
          <q-tab name="mails"  class="glossy" label="Mails" icon="home" />
          <q-tab name="alarms" class="glossy" label="Alarms" icon="store" />
          <q-tab name="movies" class="glossy" label="Movies" icon="add" />
        </q-tabs>

        <q-separator />

        <q-tab-panels v-model="tab" animated>
          <q-tab-panel name="mails">
            <div class="text-h6">Mails</div>
            <div class="col">
  			<div class="row">
  				<q-input dense class="col q-mx-sm q-mt-sm" outlined label="Name"/>
  				<q-input dense class="col q-mx-sm q-mt-sm" outlined label="Name"/>
  			</div>
  			<div class="row">
  				<q-input dense class="col q-ma-sm" outlined label="Name"/>
  				<q-input dense class="col q-ma-sm" outlined label="Name"/>
  			</div>
  			<div class="row">
  				<q-input dense class="col q-mx-sm" outlined label="Name"/>
  				<q-input dense class="col q-mx-sm" outlined label="Name"/>
  			</div>

  			<div class="row">
  				<q-input dense class="col q-mx-sm q-mt-sm" outlined label="Name"/>
  				<q-input dense class="col q-mx-sm q-mt-sm" outlined label="Name"/>
  			</div>


  		</div>
          </q-tab-panel>

          <q-tab-panel name="alarms">
            <div class="text-h6">Alarms</div>
            <div class="col">
  			<div class="row">
  				<q-input dense class="col q-mx-sm q-mt-sm" outlined label="Name"/>
  				<q-input dense class="col q-mx-sm q-mt-sm" outlined label="Name"/>
  			</div>
  			<div class="row">
  				<q-input dense class="col q-ma-sm" outlined label="Name"/>
  				<q-input dense class="col q-ma-sm" outlined label="Name"/>
  			</div>
  			<div class="row">
  				<q-input dense class="col q-mx-sm" outlined label="Name"/>
  				<q-input dense class="col q-mx-sm" outlined label="Name"/>
  			</div>

  			<div class="row">
  				<q-input dense class="col q-mx-sm q-mt-sm" outlined label="Name"/>
  				<q-input dense class="col q-mx-sm q-mt-sm" outlined label="Name"/>
  			</div>


  		</div>
          </q-tab-panel>

          <q-tab-panel name="movies">
            <div class="text-h6">Movies</div>
            <div class="col">
  			<div class="row">
  				<q-input dense class="col q-mx-sm q-mt-sm" outlined label="Name"/>
  				<q-input dense class="col q-mx-sm q-mt-sm" outlined label="Name"/>
  			</div>
  			<div class="row">
  				<q-input dense class="col q-ma-sm" outlined label="Name"/>
  				<q-input dense class="col q-ma-sm" outlined label="Name"/>
  			</div>
  			<div class="row">
  				<q-input dense class="col q-mx-sm" outlined label="Name"/>
  				<q-input dense class="col q-mx-sm" outlined label="Name"/>
  			</div>

  			<div class="row">
  				<q-input dense class="col q-mx-sm q-mt-sm" outlined label="Name"/>
  				<q-input dense class="col q-mx-sm q-mt-sm" outlined label="Name"/>
  			</div>


  		</div>
          </q-tab-panel>
        </q-tab-panels>
      </q-card>
  	</div>
  </div>
</template>

<script>
import HTitle from "../../components/Headers/HeaderTitle.vue";

export default {
  components: {HTitle},
  name: 'create',

  data () {
    return {
    	tab: 'mails',
    }
  }
}
</script>

<style lang="css" scoped>
</style>