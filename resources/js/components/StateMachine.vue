<script setup>
const props = defineProps(['currentState']);

function getClass(state) {
  return props.currentState == state ? 'stroke-cyan-500' : 'stroke-gray-500';
}
</script>
<template>
  <div class="text-center">
    <svg width="800" height="600">
      <g>
        <ellipse ry="67" rx="67" id="svg_1" cy="299" cx="141" stroke-width="10" :class="getClass('Pending')"
          fill="#fff" />
        <ellipse ry="67" rx="67" id="svg_2" cy="134" cx="548.93568" stroke-width="10" :class="getClass('Approved')"
          fill="#fff" />
        <ellipse ry="67" rx="67" id="svg_3" cy="437" cx="548.93568" stroke-width="10" :class="getClass('Rejected')"
          fill="#fff" />
        <line id="svg_5" y2="160" x2="487" y1="255" x1="198" stroke="#000" fill="none" />
        <line id="svg_6" y2="425" x2="483" y1="322" x1="206" stroke="#000" fill="none" />
        <text transform="rotate(-18.3984 335.672 189.605)" xml:space="preserve" text-anchor="start" font-size="24"
          stroke-width="0" id="svg_7" y="202" x="294" stroke="#000" fill="#000000">approve()</text>
        <text transform="rotate(20.2184 336.336 351.5)" style="cursor: move;" stroke="#000" xml:space="preserve"
          text-anchor="start" font-size="24" stroke-width="0" id="svg_8" y="364" x="304" fill="#000000">reject()</text>
        <text xml:space="preserve" text-anchor="start" font-size="24" id="svg_9" y="214" x="93" stroke-width="0"
          stroke="#000" fill="#000000">Pending</text>
        <text style="cursor: move;" xml:space="preserve" text-anchor="start" font-size="24" id="svg_10" y="55" x="505"
          stroke-width="0" stroke="#000" fill="#000000">Approved</text>
        <text xml:space="preserve" text-anchor="start" font-size="24" id="svg_11" y="356" x="498" stroke-width="0"
          stroke="#000" fill="#000000">Rejected</text>
      </g>
    </svg>
  </div>
</template>