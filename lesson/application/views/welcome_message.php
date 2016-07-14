<style>
/* -------------------------------------------------
----------------------------------------------------
    MATTBOLDT.COM
    Copyright (c) 2013 Matt Boldt
----------------------------------------------------
----------------------------------------------------
    CODE IS AVAILABLE FOR USE FREE OF CHARGE
    UNDER THE MIT LICENSE
    http://opensource.org/licenses/MIT
----------------------------------------------------
----------------------------------------------------
    If you'd like to credit me, or even donate
    a few bucks that'd be very much appreciated!
    Visit http://www.mattboldt.com/demos/social-buttons/
    for more info.
----------------------------------------------------
-------------------------------------------------- */
.sc-btn {
  display: inline-block;
  position: relative;
  margin: 0 .25em .5em 0;
  padding: 0;
  color: #fff;
  font-family: "Helvetica Neue", "Helvetica", sans-serif;
  font-size: 14px;
  font-weight: 400;
  line-height: 1em;
  text-decoration: none;
  text-shadow: rgba(0, 0, 0, 0.3) 0px -0.1em 0px;
  border: 0;
  border-radius: 0.4em;
  -webkit-border-radius: 0.4em;
  -moz-border-radius: 0.4em;
  -ms-border-radius: 0.4em;
  -o-border-radius: 0.4em;
  background-color: #1a1a1a;
  background-image: -webkit-linear-gradient(top, #595959, #1a1a1a 100%);
  background-image: -moz-linear-gradient(top, #595959, #1a1a1a);
  background-image: -ms-linear-gradient(top, #595959, #1a1a1a);
  background-image: -o-linear-gradient(top, #595959, #1a1a1a);
  background-image: linear-gradient(top, #595959, #1a1a1a);
  box-shadow: inset rgba(0, 0, 0, 0.1) 0px -0.15em 0px, inset rgba(255, 255, 255, 0.2) 0px 0.15em 0px, rgba(0, 0, 0, 0.3) 0px 0.1em 0.3em;
  text-align: center;
  background-repeat: no-repeat;
  -webkit-transition: background-position .1s ease-in-out;
  -webkit-appearance: none;
  cursor: pointer;
  overflow: hidden; }
  .sc-btn:hover {
    color: #fff; }
  .sc-btn:active {
    box-shadow: rgba(255, 255, 255, 0.2) 0 0.1em 0, inset rgba(0, 0, 0, 0.3) 0px 0.25em 1em; }

.sc-icon, .sc-text {
  display: block;
  float: left; }

.sc-icon {
  margin: 0 -.4em 0 0;
  padding: 0.6em .8em .5em;
  border-right: rgba(255, 255, 255, 0.1) 0.1em solid;
  box-shadow: inset rgba(0, 0, 0, 0.1) -0.1em 0px 0px; }

.sc-text {
  padding: .95em 1em .85em 1em;
  font-size: 1.15em;
  text-align: center; }

svg {
  width: 1.8em;
  height: 1.8em;
  fill: #fff; }

.sc-block {
  display: block; }

.sc--big {
  font-size: 24px; }

.sc--small {
  font-size: 12px; }

.sc--tiny {
  font-size: 9px; }
  .sc--tiny .sc-text {
    padding: .85em .75em .5em .75em;
    text-shadow: rgba(0, 0, 0, 0.3) 0px -1px 0px; }
  .sc--tiny .sc-icon {
    padding: .5em .75em .5em .75em;
    border-right: rgba(255, 255, 255, 0.1) 1px solid;
    box-shadow: inset rgba(0, 0, 0, 0.1) -1px 0px 0px; }

.sc--short .sc-icon {
  padding: 0.4em .9em .35em; }
.sc--short .sc-text {
  padding: .75em 1em .75em 1em; }

.sc--tall {
  font-size: 1.15em; }
  .sc--tall .sc-icon {
    padding: 1em .9em .85em; }
  .sc--tall .sc-text {
    padding: 1.25em 1em 1em 1em; }

.sc--round {
  border-radius: 5em;
  -webkit-border-radius: 5em;
  -moz-border-radius: 5em;
  -ms-border-radius: 5em;
  -o-border-radius: 5em; }
  .sc--round .sc-icon {
    padding: 0.7em .8em .5em 1em; }

.sc--flat {
  box-shadow: none;
  background-image: none !important; }
  .sc--flat .sc-icon {
    border-color: transparent; }
  .sc--flat:active {
    box-shadow: inset rgba(0, 0, 0, 0.3) 0px 0.15em 0.25em; }

.sc--shine {
  box-shadow: inset rgba(0, 0, 0, 0.1) 0px -0.15em 0px, inset rgba(255, 255, 255, 0.1) 0px 0.15em 0px, rgba(0, 0, 0, 0.3) 0px 0.1em 0.3em, inset rgba(255, 255, 255, 0.15) 0px 2.5em 0px -1em; }
  .sc--shine:active {
    box-shadow: rgba(255, 255, 255, 0.2) 0 0.1em 0, inset rgba(0, 0, 0, 0.3) 0px 0.25em 1em, inset rgba(255, 255, 255, 0.1) 0px 2.5em 0px -1em; }
  .sc--shine:before, .sc--shine:after {
    content: "";
    display: block;
    position: absolute;
    width: 100%;
    height: 0.1em; }
  .sc--shine:before {
    top: 0;
    background-image: -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.3) 20%, rgba(255, 255, 255, 0) 100%);
    background-image: -moz-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.3) 20%, rgba(255, 255, 255, 0) 100%);
    background-image: -o-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.3) 20%, rgba(255, 255, 255, 0) 100%);
    background-image: -ms-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.3) 20%, rgba(255, 255, 255, 0) 100%);
    background-image: linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.3) 20%, rgba(255, 255, 255, 0) 100%); }
  .sc--shine:after {
    bottom: .05em;
    background-image: -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.1) 80%, rgba(255, 255, 255, 0) 100%);
    background-image: -moz-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.1) 80%, rgba(255, 255, 255, 0) 100%);
    background-image: -o-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.1) 80%, rgba(255, 255, 255, 0) 100%);
    background-image: -ms-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.1) 80%, rgba(255, 255, 255, 0) 100%);
    background-image: linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.1) 80%, rgba(255, 255, 255, 0) 100%); }
  .sc--shine:active:before, .sc--shine:active:after {
    opacity: 0.5; }

.sc--default {
  color: #222;
  text-shadow: rgba(255, 255, 255, 0.4) 0 0.1em 0;
  background-color: #ebebeb;
  background-image: -webkit-linear-gradient(top, white, #ebebeb 100%);
  background-image: -moz-linear-gradient(top, white, #ebebeb);
  background-image: -ms-linear-gradient(top, white, #ebebeb);
  background-image: -o-linear-gradient(top, white, #ebebeb);
  background-image: linear-gradient(top, white, #ebebeb); }
  .sc--default svg {
    fill: #222; }
  .sc--default:hover {
    color: #222;
    background-color: #d2d2d2;
    background-image: -webkit-linear-gradient(top, white, #d2d2d2 90%);
    background-image: -moz-linear-gradient(top, white, #d2d2d2);
    background-image: -ms-linear-gradient(top, white, #d2d2d2);
    background-image: -o-linear-gradient(top, white, #d2d2d2);
    background-image: linear-gradient(top, white, #d2d2d2);
    background-color: #fdfdfd; }
  .sc--default:active {
    background-color: #dfdfdf;
    background-image: -webkit-linear-gradient(top, white, #dfdfdf 100%);
    background-image: -moz-linear-gradient(top, white, #dfdfdf);
    background-image: -ms-linear-gradient(top, white, #dfdfdf);
    background-image: -o-linear-gradient(top, white, #dfdfdf);
    background-image: linear-gradient(top, white, #dfdfdf); }

.sc--facebook {
  background-color: #33477a;
  background-image: -webkit-linear-gradient(top, #5975ba, #33477a 100%);
  background-image: -moz-linear-gradient(top, #5975ba, #33477a);
  background-image: -ms-linear-gradient(top, #5975ba, #33477a);
  background-image: -o-linear-gradient(top, #5975ba, #33477a);
  background-image: linear-gradient(top, #5975ba, #33477a); }
  .sc--facebook:hover {
    background-color: #304373;
    background-image: -webkit-linear-gradient(top, #6b84c1, #304373 90%);
    background-image: -moz-linear-gradient(top, #6b84c1, #304373);
    background-image: -ms-linear-gradient(top, #6b84c1, #304373);
    background-image: -o-linear-gradient(top, #6b84c1, #304373);
    background-image: linear-gradient(top, #6b84c1, #304373);
    background-color: #4560a5; }
  .sc--facebook:active {
    background-color: #33477a;
    background-image: -webkit-linear-gradient(top, #4a66b0, #33477a 100%);
    background-image: -moz-linear-gradient(top, #4a66b0, #33477a);
    background-image: -ms-linear-gradient(top, #4a66b0, #33477a);
    background-image: -o-linear-gradient(top, #4a66b0, #33477a);
    background-image: linear-gradient(top, #4a66b0, #33477a); }

.sc--twitter {
  background-color: #108ac1;
  background-image: -webkit-linear-gradient(top, #47bbf0, #108ac1 100%);
  background-image: -moz-linear-gradient(top, #47bbf0, #108ac1);
  background-image: -ms-linear-gradient(top, #47bbf0, #108ac1);
  background-image: -o-linear-gradient(top, #47bbf0, #108ac1);
  background-image: linear-gradient(top, #47bbf0, #108ac1); }
  .sc--twitter:hover {
    background-color: #0f83b8;
    background-image: -webkit-linear-gradient(top, #76cdf4, #0f83b8 90%);
    background-image: -moz-linear-gradient(top, #76cdf4, #0f83b8);
    background-image: -ms-linear-gradient(top, #76cdf4, #0f83b8);
    background-image: -o-linear-gradient(top, #76cdf4, #0f83b8);
    background-image: linear-gradient(top, #76cdf4, #0f83b8);
    background-color: #21aded; }
  .sc--twitter:active {
    background-color: #108ac1;
    background-image: -webkit-linear-gradient(top, #30b3ee, #108ac1 100%);
    background-image: -moz-linear-gradient(top, #30b3ee, #108ac1);
    background-image: -ms-linear-gradient(top, #30b3ee, #108ac1);
    background-image: -o-linear-gradient(top, #30b3ee, #108ac1);
    background-image: linear-gradient(top, #30b3ee, #108ac1); }

.sc--tumblr {
  background-color: #243649;
  background-image: -webkit-linear-gradient(top, #46688d, #243649 100%);
  background-image: -moz-linear-gradient(top, #46688d, #243649);
  background-image: -ms-linear-gradient(top, #46688d, #243649);
  background-image: -o-linear-gradient(top, #46688d, #243649);
  background-image: linear-gradient(top, #46688d, #243649); }
  .sc--tumblr:hover {
    background-color: #213142;
    background-image: -webkit-linear-gradient(top, #4e759e, #213142 90%);
    background-image: -moz-linear-gradient(top, #4e759e, #213142);
    background-image: -ms-linear-gradient(top, #4e759e, #213142);
    background-image: -o-linear-gradient(top, #4e759e, #213142);
    background-image: linear-gradient(top, #4e759e, #213142);
    background-color: #385472; }
  .sc--tumblr:active {
    background-color: #243649;
    background-image: -webkit-linear-gradient(top, #3d5c7c, #243649 100%);
    background-image: -moz-linear-gradient(top, #3d5c7c, #243649);
    background-image: -ms-linear-gradient(top, #3d5c7c, #243649);
    background-image: -o-linear-gradient(top, #3d5c7c, #243649);
    background-image: linear-gradient(top, #3d5c7c, #243649); }

.sc--instagram {
  background-color: #2c4d6e;
  background-image: -webkit-linear-gradient(top, #4a81b6, #2c4d6e 100%);
  background-image: -moz-linear-gradient(top, #4a81b6, #2c4d6e);
  background-image: -ms-linear-gradient(top, #4a81b6, #2c4d6e);
  background-image: -o-linear-gradient(top, #4a81b6, #2c4d6e);
  background-image: linear-gradient(top, #4a81b6, #2c4d6e); }
  .sc--instagram:hover {
    background-color: #294866;
    background-image: -webkit-linear-gradient(top, #5c8dbd, #294866 90%);
    background-image: -moz-linear-gradient(top, #5c8dbd, #294866);
    background-image: -ms-linear-gradient(top, #5c8dbd, #294866);
    background-image: -o-linear-gradient(top, #5c8dbd, #294866);
    background-image: linear-gradient(top, #5c8dbd, #294866);
    background-color: #3e6c99; }
  .sc--instagram:active {
    background-color: #2c4d6e;
    background-image: -webkit-linear-gradient(top, #4274a4, #2c4d6e 100%);
    background-image: -moz-linear-gradient(top, #4274a4, #2c4d6e);
    background-image: -ms-linear-gradient(top, #4274a4, #2c4d6e);
    background-image: -o-linear-gradient(top, #4274a4, #2c4d6e);
    background-image: linear-gradient(top, #4274a4, #2c4d6e); }

.sc--pinterest {
  background-color: #95031e;
  background-image: -webkit-linear-gradient(top, #f90532, #95031e 100%);
  background-image: -moz-linear-gradient(top, #f90532, #95031e);
  background-image: -ms-linear-gradient(top, #f90532, #95031e);
  background-image: -o-linear-gradient(top, #f90532, #95031e);
  background-image: linear-gradient(top, #f90532, #95031e); }
  .sc--pinterest:hover {
    background-color: #8b031c;
    background-image: -webkit-linear-gradient(top, #fa1d46, #8b031c 90%);
    background-image: -moz-linear-gradient(top, #fa1d46, #8b031c);
    background-image: -ms-linear-gradient(top, #fa1d46, #8b031c);
    background-image: -o-linear-gradient(top, #fa1d46, #8b031c);
    background-image: linear-gradient(top, #fa1d46, #8b031c);
    background-color: #d1042a; }
  .sc--pinterest:active {
    background-color: #95031e;
    background-image: -webkit-linear-gradient(top, #e0052d, #95031e 100%);
    background-image: -moz-linear-gradient(top, #e0052d, #95031e);
    background-image: -ms-linear-gradient(top, #e0052d, #95031e);
    background-image: -o-linear-gradient(top, #e0052d, #95031e);
    background-image: linear-gradient(top, #e0052d, #95031e); }

.sc--pinterest-inverse {
  color: #c70428;
  background-color: #dfdfdf;
  background-image: -webkit-linear-gradient(top, white, #dfdfdf 100%);
  background-image: -moz-linear-gradient(top, white, #dfdfdf);
  background-image: -ms-linear-gradient(top, white, #dfdfdf);
  background-image: -o-linear-gradient(top, white, #dfdfdf);
  background-image: linear-gradient(top, white, #dfdfdf); }
  .sc--pinterest-inverse .sc-text {
    text-shadow: rgba(255, 255, 255, 0.5) 0 0.1em 0; }
  .sc--pinterest-inverse:hover {
    background-color: #c5c5c5;
    background-image: -webkit-linear-gradient(top, white, #c5c5c5 90%);
    background-image: -moz-linear-gradient(top, white, #c5c5c5);
    background-image: -ms-linear-gradient(top, white, #c5c5c5);
    background-image: -o-linear-gradient(top, white, #c5c5c5);
    background-image: linear-gradient(top, white, #c5c5c5);
    background-color: #fdfdfd; }
  .sc--pinterest-inverse:active {
    background-color: #dfdfdf;
    background-image: -webkit-linear-gradient(top, white, #dfdfdf 100%);
    background-image: -moz-linear-gradient(top, white, #dfdfdf);
    background-image: -ms-linear-gradient(top, white, #dfdfdf);
    background-image: -o-linear-gradient(top, white, #dfdfdf);
    background-image: linear-gradient(top, white, #dfdfdf);
    box-shadow: rgba(255, 255, 255, 0.2) 0 0.1em 0, inset rgba(0, 0, 0, 0.2) 0px 0.25em 1em; }
  .sc--pinterest-inverse svg {
    fill: #c70428; }

.sc--google-plus {
  background-color: #b92d25;
  background-image: -webkit-linear-gradient(top, #e06b64, #b92d25 100%);
  background-image: -moz-linear-gradient(top, #e06b64, #b92d25);
  background-image: -ms-linear-gradient(top, #e06b64, #b92d25);
  background-image: -o-linear-gradient(top, #e06b64, #b92d25);
  background-image: linear-gradient(top, #e06b64, #b92d25); }
  .sc--google-plus:hover {
    background-color: #b12b23;
    background-image: -webkit-linear-gradient(top, #e57f79, #b12b23 90%);
    background-image: -moz-linear-gradient(top, #e57f79, #b12b23);
    background-image: -ms-linear-gradient(top, #e57f79, #b12b23);
    background-image: -o-linear-gradient(top, #e57f79, #b12b23);
    background-image: linear-gradient(top, #e57f79, #b12b23);
    background-color: #da4a42; }
  .sc--google-plus:active {
    background-color: #b92d25;
    background-image: -webkit-linear-gradient(top, #dc564e, #b92d25 100%);
    background-image: -moz-linear-gradient(top, #dc564e, #b92d25);
    background-image: -ms-linear-gradient(top, #dc564e, #b92d25);
    background-image: -o-linear-gradient(top, #dc564e, #b92d25);
    background-image: linear-gradient(top, #dc564e, #b92d25); }

.sc--dribbble {
  background-color: #e82a79;
  background-image: -webkit-linear-gradient(top, #f286b3, #e82a79 100%);
  background-image: -moz-linear-gradient(top, #f286b3, #e82a79);
  background-image: -ms-linear-gradient(top, #f286b3, #e82a79);
  background-image: -o-linear-gradient(top, #f286b3, #e82a79);
  background-image: linear-gradient(top, #f286b3, #e82a79); }
  .sc--dribbble:hover {
    background-color: #e72173;
    background-image: -webkit-linear-gradient(top, #f49dc1, #e72173 90%);
    background-image: -moz-linear-gradient(top, #f49dc1, #e72173);
    background-image: -ms-linear-gradient(top, #f49dc1, #e72173);
    background-image: -o-linear-gradient(top, #f49dc1, #e72173);
    background-image: linear-gradient(top, #f49dc1, #e72173);
    background-color: #ee619c; }
  .sc--dribbble:active {
    background-color: #e82a79;
    background-image: -webkit-linear-gradient(top, #ef6fa4, #e82a79 100%);
    background-image: -moz-linear-gradient(top, #ef6fa4, #e82a79);
    background-image: -ms-linear-gradient(top, #ef6fa4, #e82a79);
    background-image: -o-linear-gradient(top, #ef6fa4, #e82a79);
    background-image: linear-gradient(top, #ef6fa4, #e82a79); }

.sc--flickr {
  background-color: #0a4eb2;
  background-image: -webkit-linear-gradient(top, #2f7ef3, #0a4eb2 100%);
  background-image: -moz-linear-gradient(top, #2f7ef3, #0a4eb2);
  background-image: -ms-linear-gradient(top, #2f7ef3, #0a4eb2);
  background-image: -o-linear-gradient(top, #2f7ef3, #0a4eb2);
  background-image: linear-gradient(top, #2f7ef3, #0a4eb2); }
  .sc--flickr:hover {
    background-color: #0a4aa8;
    background-image: -webkit-linear-gradient(top, #478df4, #0a4aa8 90%);
    background-image: -moz-linear-gradient(top, #478df4, #0a4aa8);
    background-image: -ms-linear-gradient(top, #478df4, #0a4aa8);
    background-image: -o-linear-gradient(top, #478df4, #0a4aa8);
    background-image: linear-gradient(top, #478df4, #0a4aa8);
    background-color: #0e67ec; }
  .sc--flickr:active {
    background-color: #0a4eb2;
    background-image: -webkit-linear-gradient(top, #176ff2, #0a4eb2 100%);
    background-image: -moz-linear-gradient(top, #176ff2, #0a4eb2);
    background-image: -ms-linear-gradient(top, #176ff2, #0a4eb2);
    background-image: -o-linear-gradient(top, #176ff2, #0a4eb2);
    background-image: linear-gradient(top, #176ff2, #0a4eb2); }

.sc--forrst {
  background-color: #294d18;
  background-image: -webkit-linear-gradient(top, #3d7324, #294d18 100%);
  background-image: -moz-linear-gradient(top, #3d7324, #294d18);
  background-image: -ms-linear-gradient(top, #3d7324, #294d18);
  background-image: -o-linear-gradient(top, #3d7324, #294d18);
  background-image: linear-gradient(top, #3d7324, #294d18); }
  .sc--forrst:hover {
    background-color: #294d18;
    background-image: -webkit-linear-gradient(top, #447f28, #294d18 100%);
    background-image: -moz-linear-gradient(top, #447f28, #294d18);
    background-image: -ms-linear-gradient(top, #447f28, #294d18);
    background-image: -o-linear-gradient(top, #447f28, #294d18);
    background-image: linear-gradient(top, #447f28, #294d18);
    background-color: #376820; }
  .sc--forrst:active {
    background-color: #294d18;
    background-image: -webkit-linear-gradient(top, #396c22, #294d18 100%);
    background-image: -moz-linear-gradient(top, #396c22, #294d18);
    background-image: -ms-linear-gradient(top, #396c22, #294d18);
    background-image: -o-linear-gradient(top, #396c22, #294d18);
    background-image: linear-gradient(top, #396c22, #294d18); }

.sc--github {
  background-color: #3269a0;
  background-image: -webkit-linear-gradient(top, #689cd0, #3269a0 100%);
  background-image: -moz-linear-gradient(top, #689cd0, #3269a0);
  background-image: -ms-linear-gradient(top, #689cd0, #3269a0);
  background-image: -o-linear-gradient(top, #689cd0, #3269a0);
  background-image: linear-gradient(top, #689cd0, #3269a0); }
  .sc--github:hover {
    background-color: #2f6498;
    background-image: -webkit-linear-gradient(top, #7ba9d6, #2f6498 90%);
    background-image: -moz-linear-gradient(top, #7ba9d6, #2f6498);
    background-image: -ms-linear-gradient(top, #7ba9d6, #2f6498);
    background-image: -o-linear-gradient(top, #7ba9d6, #2f6498);
    background-image: linear-gradient(top, #7ba9d6, #2f6498);
    background-color: #4988c6; }
  .sc--github:active {
    background-color: #3269a0;
    background-image: -webkit-linear-gradient(top, #5490ca, #3269a0 100%);
    background-image: -moz-linear-gradient(top, #5490ca, #3269a0);
    background-image: -ms-linear-gradient(top, #5490ca, #3269a0);
    background-image: -o-linear-gradient(top, #5490ca, #3269a0);
    background-image: linear-gradient(top, #5490ca, #3269a0); }

.sc--lastfm {
  background-color: #901919;
  background-image: -webkit-linear-gradient(top, #dc3333, #901919 100%);
  background-image: -moz-linear-gradient(top, #dc3333, #901919);
  background-image: -ms-linear-gradient(top, #dc3333, #901919);
  background-image: -o-linear-gradient(top, #dc3333, #901919);
  background-image: linear-gradient(top, #dc3333, #901919); }
  .sc--lastfm:hover {
    background-color: #881717;
    background-image: -webkit-linear-gradient(top, #e04949, #881717 90%);
    background-image: -moz-linear-gradient(top, #e04949, #881717);
    background-image: -ms-linear-gradient(top, #e04949, #881717);
    background-image: -o-linear-gradient(top, #e04949, #881717);
    background-image: linear-gradient(top, #e04949, #881717);
    background-color: #c52121; }
  .sc--lastfm:active {
    background-color: #901919;
    background-image: -webkit-linear-gradient(top, #d22424, #901919 100%);
    background-image: -moz-linear-gradient(top, #d22424, #901919);
    background-image: -ms-linear-gradient(top, #d22424, #901919);
    background-image: -o-linear-gradient(top, #d22424, #901919);
    background-image: linear-gradient(top, #d22424, #901919); }

.sc--reddit {
  background-color: #387cc4;
  background-image: -webkit-linear-gradient(top, #86b0dc, #387cc4 100%);
  background-image: -moz-linear-gradient(top, #86b0dc, #387cc4);
  background-image: -ms-linear-gradient(top, #86b0dc, #387cc4);
  background-image: -o-linear-gradient(top, #86b0dc, #387cc4);
  background-image: linear-gradient(top, #86b0dc, #387cc4); }
  .sc--reddit:hover {
    background-color: #3677bc;
    background-image: -webkit-linear-gradient(top, #99bde2, #3677bc 90%);
    background-image: -moz-linear-gradient(top, #99bde2, #3677bc);
    background-image: -ms-linear-gradient(top, #99bde2, #3677bc);
    background-image: -o-linear-gradient(top, #99bde2, #3677bc);
    background-image: linear-gradient(top, #99bde2, #3677bc);
    background-color: #669bd3; }
  .sc--reddit:active {
    background-color: #387cc4;
    background-image: -webkit-linear-gradient(top, #72a3d7, #387cc4 100%);
    background-image: -moz-linear-gradient(top, #72a3d7, #387cc4);
    background-image: -ms-linear-gradient(top, #72a3d7, #387cc4);
    background-image: -o-linear-gradient(top, #72a3d7, #387cc4);
    background-image: linear-gradient(top, #72a3d7, #387cc4); }

.sc--soundcloud {
  background-color: #cc3300;
  background-image: -webkit-linear-gradient(top, #ff6633, #cc3300 100%);
  background-image: -moz-linear-gradient(top, #ff6633, #cc3300);
  background-image: -ms-linear-gradient(top, #ff6633, #cc3300);
  background-image: -o-linear-gradient(top, #ff6633, #cc3300);
  background-image: linear-gradient(top, #ff6633, #cc3300); }
  .sc--soundcloud:hover {
    background-color: #c23100;
    background-image: -webkit-linear-gradient(top, #ff794d, #c23100 90%);
    background-image: -moz-linear-gradient(top, #ff794d, #c23100);
    background-image: -ms-linear-gradient(top, #ff794d, #c23100);
    background-image: -o-linear-gradient(top, #ff794d, #c23100);
    background-image: linear-gradient(top, #ff794d, #c23100);
    background-color: #ff480a; }
  .sc--soundcloud:active {
    background-color: #cc3300;
    background-image: -webkit-linear-gradient(top, #ff531a, #cc3300 100%);
    background-image: -moz-linear-gradient(top, #ff531a, #cc3300);
    background-image: -ms-linear-gradient(top, #ff531a, #cc3300);
    background-image: -o-linear-gradient(top, #ff531a, #cc3300);
    background-image: linear-gradient(top, #ff531a, #cc3300); }

.sc--stack-overflow {
  background-color: #ca6e00;
  background-image: -webkit-linear-gradient(top, #ffa131, #ca6e00 100%);
  background-image: -moz-linear-gradient(top, #ffa131, #ca6e00);
  background-image: -ms-linear-gradient(top, #ffa131, #ca6e00);
  background-image: -o-linear-gradient(top, #ffa131, #ca6e00);
  background-image: linear-gradient(top, #ffa131, #ca6e00); }
  .sc--stack-overflow:hover {
    background-color: #c06900;
    background-image: -webkit-linear-gradient(top, #ffad4b, #c06900 90%);
    background-image: -moz-linear-gradient(top, #ffad4b, #c06900);
    background-image: -ms-linear-gradient(top, #ffad4b, #c06900);
    background-image: -o-linear-gradient(top, #ffad4b, #c06900);
    background-image: linear-gradient(top, #ffad4b, #c06900);
    background-color: #ff8f08; }
  .sc--stack-overflow:active {
    background-color: #ca6e00;
    background-image: -webkit-linear-gradient(top, #ff9618, #ca6e00 100%);
    background-image: -moz-linear-gradient(top, #ff9618, #ca6e00);
    background-image: -ms-linear-gradient(top, #ff9618, #ca6e00);
    background-image: -o-linear-gradient(top, #ff9618, #ca6e00);
    background-image: linear-gradient(top, #ff9618, #ca6e00); }

.sc--vimeo {
  background-color: #3492b7;
  background-image: -webkit-linear-gradient(top, #79bdd8, #3492b7 100%);
  background-image: -moz-linear-gradient(top, #79bdd8, #3492b7);
  background-image: -ms-linear-gradient(top, #79bdd8, #3492b7);
  background-image: -o-linear-gradient(top, #79bdd8, #3492b7);
  background-image: linear-gradient(top, #79bdd8, #3492b7); }
  .sc--vimeo:hover {
    background-color: #328baf;
    background-image: -webkit-linear-gradient(top, #8cc7de, #328baf 90%);
    background-image: -moz-linear-gradient(top, #8cc7de, #328baf);
    background-image: -ms-linear-gradient(top, #8cc7de, #328baf);
    background-image: -o-linear-gradient(top, #8cc7de, #328baf);
    background-image: linear-gradient(top, #8cc7de, #328baf);
    background-color: #59aecf; }
  .sc--vimeo:active {
    background-color: #3492b7;
    background-image: -webkit-linear-gradient(top, #65b4d3, #3492b7 100%);
    background-image: -moz-linear-gradient(top, #65b4d3, #3492b7);
    background-image: -ms-linear-gradient(top, #65b4d3, #3492b7);
    background-image: -o-linear-gradient(top, #65b4d3, #3492b7);
    background-image: linear-gradient(top, #65b4d3, #3492b7); }

.sc--vimeo-styled {
  background-color: #5bb3d7;
  background-image: -webkit-linear-gradient(left, #89daf7 0%, #89daf7 10%, #9fa5a8 10%, #9fa5a8 20%, #f58182 20%, #f58182 30%, #fcf4c0 30%, #fcf4c0 40%, #5bb3d7 40%, #5bb3d7 50%, #6b6b6b 50%, #6b6b6b 60%, #b0d570 60%, #b0d570 70%, #53a4c1 70%, #53a4c1 80%, #9e292c 80%, #9e292c 90%, #d4cd99 90%, #d4cd99 100%);
  background-image: -moz-linear-gradient(left, #89daf7 0%, #89daf7 10%, #9fa5a8 10%, #9fa5a8 20%, #f58182 20%, #f58182 30%, #fcf4c0 30%, #fcf4c0 40%, #5bb3d7 40%, #5bb3d7 50%, #6b6b6b 50%, #6b6b6b 60%, #b0d570 60%, #b0d570 70%, #53a4c1 70%, #53a4c1 80%, #9e292c 80%, #9e292c 90%, #d4cd99 90%, #d4cd99 100%);
  background-image: -ms-linear-gradient(left, #89daf7 0%, #89daf7 10%, #9fa5a8 10%, #9fa5a8 20%, #f58182 20%, #f58182 30%, #fcf4c0 30%, #fcf4c0 40%, #5bb3d7 40%, #5bb3d7 50%, #6b6b6b 50%, #6b6b6b 60%, #b0d570 60%, #b0d570 70%, #53a4c1 70%, #53a4c1 80%, #9e292c 80%, #9e292c 90%, #d4cd99 90%, #d4cd99 100%);
  background-image: -o-linear-gradient(left, #89daf7 0%, #89daf7 10%, #9fa5a8 10%, #9fa5a8 20%, #f58182 20%, #f58182 30%, #fcf4c0 30%, #fcf4c0 40%, #5bb3d7 40%, #5bb3d7 50%, #6b6b6b 50%, #6b6b6b 60%, #b0d570 60%, #b0d570 70%, #53a4c1 70%, #53a4c1 80%, #9e292c 80%, #9e292c 90%, #d4cd99 90%, #d4cd99 100%);
  background-image: linear-gradient(left, #89daf7 0%, #89daf7 10%, #9fa5a8 10%, #9fa5a8 20%, #f58182 20%, #f58182 30%, #fcf4c0 30%, #fcf4c0 40%, #5bb3d7 40%, #5bb3d7 50%, #6b6b6b 50%, #6b6b6b 60%, #b0d570 60%, #b0d570 70%, #53a4c1 70%, #53a4c1 80%, #9e292c 80%, #9e292c 90%, #d4cd99 90%, #d4cd99 100%); }
  .sc--vimeo-styled:hover {
    box-shadow: inset rgba(0, 0, 0, 0.1) 0px -0.15em 0px, inset rgba(255, 255, 255, 0.2) 0px 0.15em 0px, rgba(0, 0, 0, 0.3) 0px 0.1em 0.3em, inset rgba(255, 255, 255, 0.4) 0px 1em 3em; }
  .sc--vimeo-styled:active {
    box-shadow: rgba(255, 255, 255, 0.2) 0 0.1em 0, inset rgba(0, 0, 0, 0.3) 0px 0.25em 1em; }

.sc--rss {
  background-color: #c96213;
  background-image: -webkit-linear-gradient(top, #ee9754, #c96213 100%);
  background-image: -moz-linear-gradient(top, #ee9754, #c96213);
  background-image: -ms-linear-gradient(top, #ee9754, #c96213);
  background-image: -o-linear-gradient(top, #ee9754, #c96213);
  background-image: linear-gradient(top, #ee9754, #c96213); }
  .sc--rss:hover {
    background-color: #bf5e12;
    background-image: -webkit-linear-gradient(top, #f1a56b, #bf5e12 90%);
    background-image: -moz-linear-gradient(top, #f1a56b, #bf5e12);
    background-image: -ms-linear-gradient(top, #f1a56b, #bf5e12);
    background-image: -o-linear-gradient(top, #f1a56b, #bf5e12);
    background-image: linear-gradient(top, #f1a56b, #bf5e12);
    background-color: #eb812e; }
  .sc--rss:active {
    background-color: #c96213;
    background-image: -webkit-linear-gradient(top, #ec893c, #c96213 100%);
    background-image: -moz-linear-gradient(top, #ec893c, #c96213);
    background-image: -ms-linear-gradient(top, #ec893c, #c96213);
    background-image: -o-linear-gradient(top, #ec893c, #c96213);
    background-image: linear-gradient(top, #ec893c, #c96213); }

@media (max-width: 768px) {
    body {
        margin-top:25%;
        background-color:rgba(0,0,0,0.0);
    }
}
@media (min-width:769px) {
    body {
        margin-top:5%;
        background-color:rgba(0,0,0,0.0);
    }
}

</style>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <div style="text-align:center;background-color:rgba(0,0,0,0.5);border-radius:25px;padding:5% 1% 2% 9%;color:#b09256;font-family: 'Gloria Hallelujah', cursive;">
            <?php if (isset($error)):?>
                <h2><?php echo $error?></h2>
            <?php endif;?>
            <div>
                <!-- FACEBOOK -->
                <a href="https://www.facebook.com/dialog/oauth?client_id=1678968362360848&scope=public_profile,email,user_friends&redirect_uri=https://caldrivers.com/lesson/handlelogin" class="sc-btn sc--facebook">
                    <span class="sc-icon">
                        <svg viewBox="0 0 33 33" width="25" height="25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M 17.996,32L 12,32 L 12,16 l-4,0 l0-5.514 l 4-0.002l-0.006-3.248C 11.993,2.737, 13.213,0, 18.512,0l 4.412,0 l0,5.515 l-2.757,0 c-2.063,0-2.163,0.77-2.163,2.209l-0.008,2.76l 4.959,0 l-0.585,5.514L 18,16L 17.996,32z"></path></g></svg>
                    </span>
                    <span class="sc-text">Log in with Facebook</span>
                </a>
            </div>
            <h2 style="margin-bottom:5%">Login here:</h2>
            <div style="text-align:center">   
                <form method="post" action="handlelogin">
                    <table>
                    <tr><td style="padding-left:2%"><label>E-mail: </label></td><td><input name="email" id="email" /></td></tr>
                    <tr><td style="padding-left:2%"><label>Password: </label></td><td><input name="pass" type="password" /></td></tr>
                    </table>
                    <div style="margin-top:5%">
                        <input type="submit" value="Log in" />
                    </div>
                </form>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div style="text-align:center;background-color:rgba(0,0,0,0.5);border-radius:25px;padding:17.0% 0">
                <h1><a style="color:#b09256;" href="register">Create an account</a></h1>
                <h2><a style="color:#b09256" href="recover">Forgot Password</a></h2>
            </div>
        </div>
    </div>
</div>
