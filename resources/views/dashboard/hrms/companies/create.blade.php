@extends('layouts.dashboard.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">

    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col mb-4 gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $page_title }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <button onclick="history.go(-1)"
                                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                                    <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                                </button>
                                <button id="submitBtn" data-tw-merge=""
                                        class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                            data-tw-merge="" data-lucide="save" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                        <span id="loadingText">Save Changes</span>
                                </button>
                                 
                            </div>
                        </div>
                        <div class="mt-1.5 flex flex-col">
                             
                            <div class="box box--stacked flex flex-col p-5">
                            

                            <form id="createCompany" method="post"  action="{{ url('auth/complete_company_register') }}">
                                                        
                                                        <div class="box box--stacked flex flex-col p-5">
                                                            
                                                            <div>
                                                                

                                                                <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                                    <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                                        <div class="text-left">
                                                                            <div class="flex items-center">
                                                                                <div class="font-medium">Company Name</div>
                                                                                <div
                                                                                    class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                                    Required
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                                                Enter the primary line of your company name.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3 w-full flex-1 xl:mt-0">
                                                                        <input type="hidden" name="user_id" value="">
                                                                        <input type="hidden" name="parent_company" value="">
                                                                        <input data-tw-merge="" name="company_name" type="text" placeholder="PT. XYZ "
                                                                            class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                                    </div>
                                                                </div>
                                                                <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                                    <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                                        <div class="text-left">
                                                                            <div class="flex items-center">
                                                                                <div class="font-medium">Address Line</div>
                                                                                <div
                                                                                    class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                                    Required
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                                                Enter the primary line of physical address,
                                                                                typically including building number and
                                                                                street name.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3 w-full flex-1 xl:mt-0">
                                                                        <textarea name="address" data-tw-merge="" type="text" placeholder="Address Line"
                                                                            class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                                    <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                                        <div class="text-left">
                                                                            <div class="flex items-center">
                                                                                <div class="font-medium">Default Currency</div>
                                                                                <div
                                                                                    class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                                    Required
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                                                Please specify the default you currency.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3 w-full flex-1 xl:mt-0">
                                                                        <select name="default_currency" data-placeholder="Select your currency" class="tom-select w-full">
                                                                            <option value="IDR">
                                                                                IDR
                                                                            </option>
                                                                        
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                                    <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                                        <div class="text-left">
                                                                            <div class="flex items-center">
                                                                                <div class="font-medium">Language</div>
                                                                                <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                                    Required
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                                                Select your preferred language from the available
                                                                                options.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3 w-full flex-1 xl:mt-0">
                                                                        <select id="languageSelect" name="language" data-title="Language" data-placeholder="Select your language" class="tom-select w-full" data-selected="">
                                                                            <option value="en">
                                                                                English
                                                                            </option>
                                                                            <option value="id">
                                                                                Bahasa
                                                                            </option> 
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                                    <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                                        <div class="text-left">
                                                                            <div class="flex items-center">
                                                                                <div class="font-medium">Time Zone</div>
                                                                                <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                                    Required
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                                                Select your current time zone from the list of
                                                                                available options.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3 w-full flex-1 xl:mt-0">
                                                                        <select id="timezoneSelect" name="time_zone" data-title="Time Zone" data-url="{{ url('dashboard/settings/timezone') }}" data-placeholder="Select your timezone" class="tom-select w-full">
                                                                            <option value="Asia/Jakarta">
                                                                                Asia/Jakarta (WIB)
                                                                            </option>
                                                                            <option value="Asia/Ujung_Pandang">
                                                                                Asia/Ujung_Pandang (WITA)
                                                                            </option>
                                                                            <option value="Asia/Jayapura">
                                                                                Asia/Jayapura (WIT)
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                                    <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                                        <div class="text-left">
                                                                            <div class="flex items-center">
                                                                                <div class="font-medium">Official Domain</div>
                                                                                
                                                                            </div>
                                                                            <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                                                Enter the official domain or website address.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3 w-full flex-1 xl:mt-0">
                                                                        <input data-tw-merge="" name="domain" type="text" placeholder="www.xyz.com"
                                                                            class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                                    </div>
                                                                </div>
                                                                <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                                    <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                                        <div class="text-left">
                                                                            <div class="flex items-center">
                                                                                <div class="font-medium">Date of Establishment</div>
                                                                            </div>
                                                                            <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                                                This field is optional and can be used to provide date of establishment your company.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3 w-full flex-1 xl:mt-0">
                                                                        <input data-tw-merge="" name="date_of_establishment" type="date" placeholder="Y-m-d"
                                                                            class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
                                                                </div>
                                                                <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                                    <div class="text-left">
                                                                        <div class="flex items-center">
                                                                            <div class="font-medium">Company Coordinate</div>
                                                                            <div
                                                                                class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                                Required
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                                    
                                                                    <div class="mt-3 w-full flex-1 xl:mt-0">
                                                                    <input id="latlong" name="latlong" type="hidden" />
                                                                        <input data-tw-merge="" name="address" id="start-search" type="text" placeholder="Type your company address"
                                                                            class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                                            <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                                                This location will be used to set distance of presensi employees.
                                                                            </div>
                                                                        </div>
                                                                    <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                                    
                                                                    </div>
                                                                </div>
                                                                <div id="map" style="height: 400px" class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                                
                                                                    <div ></div>
                                                                </div>

                                                            </div>
                                                            
                                                            <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
                                                            </div>
                                                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                                                
                                                            </div>
                                                        </div> 
                                                        </form>

                            


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('dist/js/vendors/tom-select.js') }}"></script>
    <script src="{{ asset('dist/js/components/base/tom-select.js') }}"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7T5886HCdj0jMOWhW_aliRYP6NUnjSzE&loading=async&libraries=places&libraries=marker&callback=initialize&region=id&v=weekly"></script>
    <script>
    async function initialize() {
        await google.maps.importLibrary("places");
        await google.maps.importLibrary("marker")
        let mapOptions, map, marker, searchBox, infoWindow = '',
            addressEl = document.getElementById('start-search'),
            element = document.getElementById('map'),
            latLong = document.getElementById('latlong');
            position = null;
            
        const [lat, lng] = latLong.value.split(',').map(Number);
        if (!isNaN(lat) && !isNaN(lng)) {
             position = new google.maps.LatLng(lat, lng);
        }
        
        console.log(position);
        mapOptions = {
            zoom: 5,
            center: new google.maps.LatLng(-2.2496319, 109.9386476),
            disableDefaultUI: false,
            scrollWheel: true,
            draggable: true,
            mapId: 'e325f37817b4c9e2'
        };

        map = new google.maps.Map(element, mapOptions);

        marker = new google.maps.marker.AdvancedMarkerElement({
            position: position,
            map: map,
            gmpDraggable: true,
        });

        const options = {
            bounds: new google.maps.LatLngBounds(),
            componentRestrictions: { country: "id" }
        };

        searchBox = new google.maps.places.Autocomplete(addressEl, options);

        searchBox.addListener('place_changed', function () {
            let places = searchBox.getPlace(),
                bounds = new google.maps.LatLngBounds(),
                lat = places.geometry.location.lat(),
                long = places.geometry.location.lng();

            bounds.extend(places.geometry.location);
            marker.position = places.geometry.location;
            map.fitBounds(bounds);
            map.setZoom(15);
            latLong.value = `${lat},${long}`;
        });

        marker.addListener("dragend", function (event) {
            const position = marker.position;
             
            let lat = position.lat,
                long = position.lng

            let geocoder = new google.maps.Geocoder();
            geocoder.geocode({ latLng: marker.position }, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK && results[0]) {
                    let address = results[0].formatted_address;
                    let pin = results[0].address_components[results[0].address_components.length - 1].long_name;
                    addressEl.value = address;
                    latLong.value = `${lat},${long}`;
                    
                    if (infoWindow) infoWindow.close();
                    infoWindow = new google.maps.InfoWindow({ content: address });
                    infoWindow.open(map, marker);
                }
            });
        });

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };

          map.setCenter(pos);
		  marker.setPosition(pos);
		  map.setZoom(15);
		 
		lat = position.coords.latitude;
        long = position.coords.longitude;

        let geocoder = new google.maps.Geocoder();
        geocoder.geocode({ latLng: marker.getPosition() }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {  // This line can also be written like if ( status == google.maps.GeocoderStatus.OK ) {
                if (results[0]) {
                    var address = results[0].formatted_address;
                    var pin =
                        results[0].address_components[
                            results[0].address_components.length - 1
                        ].long_name;
                }
                addressEl.value = address;
                latLong.value = lat + ',' + long;
                posCode.value = pin

            } else {
                console.log('Geocode was not successful for the following reason: ' + status);
            }

            
            if (infoWindow) {
                infoWindow.close();
            }
 
            infoWindow = new google.maps.InfoWindow({
                content: 'Geser sesuai titik anda berada'
            });

            setTimeout(() => {infoWindow.open(map, marker);}, 1000);
			setTimeout(() => {infoWindow.close();}, 4000);
             
        });
		 
        },
        () => {
          
        }
      );
    } else {
      
      handleLocationError(false, infoWindow, map.getCenter());
    }
    }
</script>

    <script src="{{ asset('dist/js/vendors/tab.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            const initialTab = $('ul[role="tablist"] li:first-child button');
            initialTab.addClass('active');
            $(initialTab.data('tw-target')).addClass('active').removeAttr('style').show();

            let lastActiveTabId = initialTab.data('tw-target');
            const appToken = localStorage.getItem('app_token');

            $('ul[role="tablist"] li button[role="tab"]').on('click', async function(e) {
                const newTabId = $(this).data('tw-target');

                if (lastActiveTabId !== newTabId) {
                    e.preventDefault();
                    await handleFormSubmission(lastActiveTabId);
                    lastActiveTabId = newTabId;

                    $(lastActiveTabId + "-btn").click(async function(e) {
                        console.log(lastActiveTabId + "-form");
                        e.preventDefault();
                        await handleFormSubmission(lastActiveTabId);
                    });
                }
            });

            $(lastActiveTabId + "-btn").click(async function(e) {
                e.preventDefault();
                await handleFormSubmission(lastActiveTabId);
            });
        });

        $(document).ready(function() {
        initializeTomSelect();
        let companyId = localStorage.getItem('company');
        let userId = '{{ $userId }}' ;
        $('input[name=parent_company]').val(companyId);
        $('input[name=user_id]').val(userId);
        });

        $("#createCompany").submit(async function (e) {
            e.preventDefault();
            const currentForm = $(this);
            var formData = new FormData(this);
            var jsonData = {};

            formData.forEach(function(value, key){
                jsonData[key] = value;
            });

            var param = {
                url: "{{ $apiUrl }}",
                method: "POST",
                data: JSON.stringify(jsonData),
                processData: false,
                contentType: "application/json",
                cache: false
            }

            try {
                const response = await transAjax(param);
                console.log(response);
                if (response.success == true) {
                    showSuccessNotification(response.message, "The operation was completed successfully.");
                    window.location = '{{ url("/dashboard/hrms/company/show") }}/'+response.data.id;
                }
            } catch (xhr) {
                const response = JSON.parse(xhr.responseText);
                console.log(response);
                handleErrorResponse(response, currentForm);
                
            }
            $('#submitBtn').attr('disable', false);
            $('#loadingText').html('Save Changes');
        });
 
        $('#submitBtn').on('click', function (e) {
            e.preventDefault();
            $(this).attr('disable', true);
            $('#loadingText').html('Saving...');
            
            $("#createCompany").submit();
        });

        function handleErrorResponse(result, tabId) {
            const errorString = result.error || 'An error occurred.';
            showErrorNotification('error',
                `There were validation errors on tab ${tabId}. Message : ${result.message}`, errorString);
            const errorMessages = errorString.split(', ');

            $('.error-message').remove();

            const errorPattern = /\"([^\"]+)\"/g;
            let match;

            while ((match = errorPattern.exec(errorMessages)) !== null) {
                const field = match[1];
                if (field !== 'employee_id') {
                    let fieldName = field.replace(/_/g, " ").replace(/\b\w/g, char => char.toUpperCase());
                    const input = $(`[name="${field}"]`);

                    input.addClass('is-invalid');
                    input.before(
                        `<div class="error-message text-danger mt-1 text-xs sm:ml-auto sm:mt-0 mb-2">${fieldName} is not allowed to be empty</div>`
                    );
                }
            }

            const firstErrorField = $('.error-message').first();
            if (firstErrorField.length) {
                $('html, body').animate({
                    scrollTop: firstErrorField.offset().top - 100
                }, 500);
            }
        }

    </script>
@endpush
