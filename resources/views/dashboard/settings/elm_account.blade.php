<div class="box box--stacked flex flex-col p-5">
    <div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
        {{ $page_title }}
    </div>
    <div>
    <form id="settingForm" action="{{ $apiUrlUser }}">
        <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
            <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                <div class="text-left">
                    <div class="flex items-center">
                        <div class="font-medium">Full Name</div>
                        <div
                            class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                            Required
                        </div>
                    </div>
                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                        Enter your full legal name as it appears on your
                        official identification.
                    </div>
                </div>
            </div>
            <div class="mt-3 w-full flex-1 xl:mt-0">
                <div class="flex flex-col items-center md:flex-row">
                    <input id="name" name="name" data-tw-merge="" type="text" placeholder="Full Name"
                        class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 first:rounded-b-none last:-mt-px last:rounded-t-none focus:z-10 first:md:rounded-r-none first:md:rounded-bl-md last:md:-ml-px last:md:mt-0 last:md:rounded-l-none last:md:rounded-tr-md [&:not(:first-child):not(:last-child)]:-mt-px [&:not(:first-child):not(:last-child)]:rounded-none [&:not(:first-child):not(:last-child)]:md:-ml-px [&:not(:first-child):not(:last-child)]:md:mt-0">
                </div>
            </div>
        </div>

        

        <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
            <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                <div class="text-left">
                    <div class="flex items-center">
                        <div class="font-medium">Phone Number</div>
                        <div
                            class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                            Required
                        </div>
                    </div>
                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                        Please provide a valid phone number where we can reach
                        you if needed.
                    </div>
                </div>
            </div>
            <div class="mt-3 w-full flex-1 xl:mt-0">
                <div class="flex flex-col items-center md:flex-row">
                    <input name="phone" id="phone" data-tw-merge="" type="text" placeholder="+1 (123) 456-7890"
                        class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 first:rounded-b-none last:-mt-px last:rounded-t-none focus:z-10 first:md:rounded-r-none first:md:rounded-bl-md last:md:-ml-px last:md:mt-0 last:md:rounded-l-none last:md:rounded-tr-md [&:not(:first-child):not(:last-child)]:-mt-px [&:not(:first-child):not(:last-child)]:rounded-none [&:not(:first-child):not(:last-child)]:md:-ml-px [&:not(:first-child):not(:last-child)]:md:mt-0">
                     
                </div>

            </div>
        </div>

        <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
            <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                <div class="text-left">
                    <div class="flex items-center">
                        <div class="font-medium">Country</div>
                        <div
                            class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                            Required
                        </div>
                    </div>
                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                        Please specify the country you are currently residing
                        in.
                    </div>
                </div>
            </div>
            <div class="mt-3 w-full flex-1 xl:mt-0">
                <select data-placeholder="Select your country" class="tom-select w-full">
                    <option value="0">
                        Turkmenistan
                    </option>
                    <option value="1">
                        Libya
                    </option>
                    <option value="2">
                        India
                    </option>
                    <option value="3">
                        Equatorial Guinea
                    </option>
                    <option value="4">
                        Netherlands
                    </option>
                    <option value="5">
                        Spain
                    </option>
                    <option value="6">
                        Jersey
                    </option>
                    <option value="7">
                        Nigeria
                    </option>
                    <option value="8">
                        Bolivia
                    </option>
                    <option value="9">
                        Afghanistan
                    </option>
                    <option value="10">
                        Guam
                    </option>
                    <option value="11">
                        Botswana
                    </option>
                    <option value="12">
                        China
                    </option>
                    <option value="13" selected>
                        Indonesia
                    </option>
                    <option value="14">
                        Moldova
                    </option>
                    <option value="15">
                        Andorra
                    </option>
                    <option value="16">
                        Belgium
                    </option>
                    <option value="17">
                        Kazakhstan
                    </option>
                    <option value="18">
                        Egypt
                    </option>
                    <option value="19">
                        Anguilla
                    </option>
                    <option value="20">
                        Singapore
                    </option>
                    <option value="21">
                        Austria
                    </option>
                    <option value="22">
                        British Virgin Islands
                    </option>
                    <option value="23">
                        Antarctica
                    </option>
                    <option value="24">
                        Kuwait
                    </option>
                    <option value="25">
                        Chile
                    </option>
                    <option value="26">
                        United States Minor Outlying Islands
                    </option>
                    <option value="27">
                        Greece
                    </option>
                    <option value="28">
                        Fiji
                    </option>
                    <option value="29">
                        Marshall Islands
                    </option>
                    <option value="30">
                        Cyprus
                    </option>
                    <option value="31">
                        Sweden
                    </option>
                    <option value="32">
                        Germany
                    </option>
                    <option value="33">
                        Uruguay
                    </option>
                    <option value="34">
                        Eritrea
                    </option>
                    <option value="35">
                        Guadeloupe
                    </option>
                    <option value="36">
                        Aruba
                    </option>
                    <option value="37">
                        Saint Martin
                    </option>
                    <option value="38">
                        Algeria
                    </option>
                    <option value="39">
                        Malawi
                    </option>
                    <option value="40">
                        Czechia
                    </option>
                    <option value="41">
                        Armenia
                    </option>
                    <option value="42">
                        Angola
                    </option>
                    <option value="43">
                        Liechtenstein
                    </option>
                    <option value="44">
                        Macau
                    </option>
                    <option value="45">
                        Norway
                    </option>
                    <option value="46">
                        Slovenia
                    </option>
                    <option value="47">
                        Micronesia
                    </option>
                    <option value="48">
                        Cambodia
                    </option>
                    <option value="49">
                        Guinea-Bissau
                    </option>
                    <option value="50">
                        Central African Republic
                    </option>
                    <option value="51">
                        United Arab Emirates
                    </option>
                    <option value="52">
                        Tanzania
                    </option>
                    <option value="53">
                        France
                    </option>
                    <option value="54">
                        Panama
                    </option>
                    <option value="55">
                        Malta
                    </option>
                    <option value="56">
                        Svalbard and Jan Mayen
                    </option>
                    <option value="57">
                        Chad
                    </option>
                    <option value="58">
                        Saudi Arabia
                    </option>
                    <option value="59">
                        Argentina
                    </option>
                    <option value="60">
                        Bermuda
                    </option>
                    <option value="61">
                        Saint Helena, Ascension and Tristan da Cunha
                    </option>
                    <option value="62">
                        Bangladesh
                    </option>
                    <option value="63">
                        Oman
                    </option>
                    <option value="64">
                        Eswatini
                    </option>
                    <option value="65">
                        Dominica
                    </option>
                    <option value="66">
                        Guinea
                    </option>
                    <option value="67">
                        Sudan
                    </option>
                    <option value="68">
                        Pakistan
                    </option>
                    <option value="69">
                        Brazil
                    </option>
                    <option value="70">
                        Finland
                    </option>
                    <option value="71">
                        Ethiopia
                    </option>
                    <option value="72">
                        Ireland
                    </option>
                    <option value="73">
                        Guyana
                    </option>
                    <option value="74">
                        South Africa
                    </option>
                    <option value="75">
                        Saint Pierre and Miquelon
                    </option>
                    <option value="76">
                        Papua New Guinea
                    </option>
                    <option value="77">
                        Benin
                    </option>
                    <option value="78">
                        Lesotho
                    </option>
                    <option value="79">
                        DR Congo
                    </option>
                    <option value="80">
                        Luxembourg
                    </option>
                    <option value="81">
                        Iceland
                    </option>
                    <option value="82">
                        Gabon
                    </option>
                    <option value="83">
                        Costa Rica
                    </option>
                    <option value="84">
                        Vanuatu
                    </option>
                    <option value="85">
                        Bouvet Island
                    </option>
                    <option value="86">
                        Azerbaijan
                    </option>
                    <option value="87">
                        Turkey
                    </option>
                    <option value="88">
                        Maldives
                    </option>
                    <option value="89">
                        Taiwan
                    </option>
                    <option value="90">
                        Somalia
                    </option>
                    <option value="91">
                        Liberia
                    </option>
                    <option value="92">
                        Kiribati
                    </option>
                    <option value="93">
                        Cuba
                    </option>
                    <option value="94">
                        Denmark
                    </option>
                    <option value="95">
                        Sierra Leone
                    </option>
                    <option value="96">
                        Suriname
                    </option>
                    <option value="97">
                        Montserrat
                    </option>
                    <option value="98">
                        Portugal
                    </option>
                    <option value="99">
                        São Tomé and Príncipe
                    </option>
                    <option value="100">
                        Bosnia and Herzegovina
                    </option>
                    <option value="101">
                        Saint Kitts and Nevis
                    </option>
                    <option value="102">
                        American Samoa
                    </option>
                    <option value="103">
                        Brunei
                    </option>
                    <option value="104">
                        Western Sahara
                    </option>
                    <option value="105">
                        Tajikistan
                    </option>
                    <option value="106">
                        Lebanon
                    </option>
                    <option value="107">
                        Timor-Leste
                    </option>
                    <option value="108">
                        Saint Vincent and the Grenadines
                    </option>
                    <option value="109">
                        Cocos (Keeling) Islands
                    </option>
                    <option value="110">
                        Falkland Islands
                    </option>
                    <option value="111">
                        Jamaica
                    </option>
                    <option value="112">
                        French Guiana
                    </option>
                    <option value="113">
                        Réunion
                    </option>
                    <option value="114">
                        Puerto Rico
                    </option>
                    <option value="115">
                        Tuvalu
                    </option>
                    <option value="116">
                        Turks and Caicos Islands
                    </option>
                    <option value="117">
                        Switzerland
                    </option>
                    <option value="118">
                        Djibouti
                    </option>
                    <option value="119">
                        Honduras
                    </option>
                    <option value="120">
                        Caribbean Netherlands
                    </option>
                    <option value="121">
                        Cape Verde
                    </option>
                    <option value="122">
                        Mauritania
                    </option>
                    <option value="123">
                        Belize
                    </option>
                    <option value="124">
                        Palau
                    </option>
                    <option value="125">
                        Belarus
                    </option>
                    <option value="126">
                        Gibraltar
                    </option>
                    <option value="127">
                        Saint Lucia
                    </option>
                    <option value="128">
                        Heard Island and McDonald Islands
                    </option>
                    <option value="129">
                        Dominican Republic
                    </option>
                    <option value="130">
                        Philippines
                    </option>
                    <option value="131">
                        Sint Maarten
                    </option>
                    <option value="132">
                        Curaçao
                    </option>
                    <option value="133">
                        Mayotte
                    </option>
                    <option value="134">
                        Palestine
                    </option>
                    <option value="135">
                        New Caledonia
                    </option>
                    <option value="136">
                        Isle of Man
                    </option>
                    <option value="137">
                        Solomon Islands
                    </option>
                    <option value="138">
                        Laos
                    </option>
                    <option value="139">
                        Cameroon
                    </option>
                    <option value="140">
                        Bulgaria
                    </option>
                    <option value="141">
                        Northern Mariana Islands
                    </option>
                    <option value="142">
                        Iran
                    </option>
                    <option value="143">
                        Ukraine
                    </option>
                    <option value="144">
                        United Kingdom
                    </option>
                    <option value="145">
                        Mexico
                    </option>
                    <option value="146">
                        Australia
                    </option>
                    <option value="147">
                        Haiti
                    </option>
                    <option value="148">
                        Burundi
                    </option>
                    <option value="149">
                        Norfolk Island
                    </option>
                    <option value="150">
                        French Southern and Antarctic Lands
                    </option>
                    <option value="151">
                        Kenya
                    </option>
                    <option value="152">
                        Albania
                    </option>
                    <option value="153">
                        Vietnam
                    </option>
                    <option value="154">
                        Guatemala
                    </option>
                    <option value="155">
                        Gambia
                    </option>
                    <option value="156">
                        Ghana
                    </option>
                    <option value="157">
                        Italy
                    </option>
                    <option value="158">
                        Martinique
                    </option>
                    <option value="159">
                        Kosovo
                    </option>
                    <option value="160">
                        Jordan
                    </option>
                    <option value="161">
                        Malaysia
                    </option>
                    <option value="162">
                        Syria
                    </option>
                    <option value="163">
                        Antigua and Barbuda
                    </option>
                    <option value="164">
                        Zimbabwe
                    </option>
                    <option value="165">
                        Mauritius
                    </option>
                    <option value="166">
                        Canada
                    </option>
                    <option value="167">
                        Peru
                    </option>
                    <option value="168">
                        Republic of the Congo
                    </option>
                    <option value="169">
                        Israel
                    </option>
                    <option value="170">
                        Sri Lanka
                    </option>
                    <option value="171">
                        Trinidad and Tobago
                    </option>
                    <option value="172">
                        North Korea
                    </option>
                    <option value="173">
                        Niger
                    </option>
                    <option value="174">
                        Lithuania
                    </option>
                    <option value="175">
                        South Korea
                    </option>
                    <option value="176">
                        Kyrgyzstan
                    </option>
                    <option value="177">
                        United States Virgin Islands
                    </option>
                    <option value="178">
                        United States
                    </option>
                    <option value="179">
                        Samoa
                    </option>
                    <option value="180">
                        Thailand
                    </option>
                    <option value="181">
                        Japan
                    </option>
                    <option value="182">
                        Uganda
                    </option>
                    <option value="183">
                        Barbados
                    </option>
                    <option value="184">
                        Senegal
                    </option>
                    <option value="185">
                        Myanmar
                    </option>
                    <option value="186">
                        Poland
                    </option>
                    <option value="187">
                        Tonga
                    </option>
                    <option value="188">
                        Croatia
                    </option>
                    <option value="189">
                        Slovakia
                    </option>
                    <option value="190">
                        Iraq
                    </option>
                    <option value="191">
                        Bahrain
                    </option>
                    <option value="192">
                        Nicaragua
                    </option>
                    <option value="193">
                        New Zealand
                    </option>
                    <option value="194">
                        Ivory Coast
                    </option>
                    <option value="195">
                        Romania
                    </option>
                    <option value="196">
                        Mongolia
                    </option>
                    <option value="197">
                        Hong Kong
                    </option>
                    <option value="198">
                        Hungary
                    </option>
                    <option value="199">
                        Tunisia
                    </option>
                    <option value="200">
                        Saint Barthélemy
                    </option>
                    <option value="201">
                        Burkina Faso
                    </option>
                    <option value="202">
                        North Macedonia
                    </option>
                    <option value="203">
                        Guernsey
                    </option>
                    <option value="204">
                        British Indian Ocean Territory
                    </option>
                    <option value="205">
                        Qatar
                    </option>
                    <option value="206">
                        Niue
                    </option>
                    <option value="207">
                        Serbia
                    </option>
                    <option value="208">
                        Pitcairn Islands
                    </option>
                    <option value="209">
                        Cayman Islands
                    </option>
                    <option value="210">
                        Madagascar
                    </option>
                    <option value="211">
                        Russia
                    </option>
                    <option value="212">
                        El Salvador
                    </option>
                    <option value="213">
                        Nauru
                    </option>
                    <option value="214">
                        San Marino
                    </option>
                    <option value="215">
                        Morocco
                    </option>
                    <option value="216">
                        Grenada
                    </option>
                    <option value="217">
                        Seychelles
                    </option>
                    <option value="218">
                        Georgia
                    </option>
                    <option value="219">
                        Latvia
                    </option>
                    <option value="220">
                        Cook Islands
                    </option>
                    <option value="221">
                        Monaco
                    </option>
                    <option value="222">
                        Bahamas
                    </option>
                    <option value="223">
                        South Georgia
                    </option>
                    <option value="224">
                        Åland Islands
                    </option>
                    <option value="225">
                        Namibia
                    </option>
                    <option value="226">
                        South Sudan
                    </option>
                    <option value="227">
                        Tokelau
                    </option>
                    <option value="228">
                        Estonia
                    </option>
                    <option value="229">
                        Mozambique
                    </option>
                    <option value="230">
                        Faroe Islands
                    </option>
                    <option value="231">
                        Togo
                    </option>
                    <option value="232">
                        French Polynesia
                    </option>
                    <option value="233">
                        Montenegro
                    </option>
                    <option value="234">
                        Venezuela
                    </option>
                    <option value="235">
                        Yemen
                    </option>
                    <option value="236">
                        Rwanda
                    </option>
                    <option value="237">
                        Bhutan
                    </option>
                    <option value="238">
                        Comoros
                    </option>
                    <option value="239">
                        Christmas Island
                    </option>
                    <option value="240">
                        Uzbekistan
                    </option>
                    <option value="241">
                        Vatican City
                    </option>
                    <option value="242">
                        Nepal
                    </option>
                    <option value="243">
                        Greenland
                    </option>
                    <option value="244">
                        Wallis and Futuna
                    </option>
                    <option value="245">
                        Zambia
                    </option>
                    <option value="246">
                        Ecuador
                    </option>
                    <option value="247">
                        Colombia
                    </option>
                    <option value="248">
                        Paraguay
                    </option>
                    <option value="249">
                        Mali
                    </option>
                </select>
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
                        Enter the primary line of your physical address,
                        typically including your house or building number and
                        street name.
                    </div>
                </div>
            </div>
            <div class="mt-3 w-full flex-1 xl:mt-0">
                <input data-tw-merge="" type="text" placeholder="Address Line"
                    class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
            </div>
        </div>
        
        <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
            <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                <div class="text-left">
                    <div class="flex items-center">
                        <div class="font-medium">Last Login IP</div>
                         
                    </div>
                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                        Information trait about last sign in IP address.
                    </div>
                </div>
            </div>
            <div class="mt-3 w-full flex-1 xl:mt-0">
                <input id="last_login_ip" disabled name="last_login_ip"  data-tw-merge="" type="text" placeholder=" "
                    class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
            </div>
        </div>
        <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
            <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                <div class="text-left">
                    <div class="flex items-center">
                        <div class="font-medium">Last Login Time</div>
                         
                    </div>
                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                        Information trait about last sign in timestamp.
                    </div>
                </div>
            </div>
            <div class="mt-3 w-full flex-1 xl:mt-0">
                <input id="last_login" name="last_login" disabled data-tw-merge="" type="text" placeholder="6791"
                    class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
            </div>
        </div>
    </form>
    </div>
    <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
    </div>
</div>
