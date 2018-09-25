
function calculate_tab_pembanding(doUpdate = DONT, $input = NO_SET)
{
	doUpdate = YES
	if (!$input)
	{
		doUpdate = NO;
		$input = $('');
	}

	{
		input_255_1 = parseFloat($(".input_255_1").val()) || 0;
		input_256_1 = parseFloat($(".input_256_1").val()) || 0;
		input_260_1 = parseFloat($(".input_260_1").val()) || 0;
		input_261_1 = parseFloat($(".input_261_1").val()) || 0;
		input_270_1 = parseFloat($(".input_270_1").val()) || 0;
		input_272_1 = parseFloat($(".input_272_1").val()) || 0;

		input_257_1 = input_255_1 - (input_255_1 * input_256_1 / 100);
		input_273_1 = input_270_1 * input_272_1 / 100;
		input_271_1 = input_273_1 * input_261_1;
		input_274_1 = input_257_1 - input_271_1;
		input_276_1 = input_274_1 / input_260_1;

		doUpdate = NO
		if ($input.is('.input_255_1,.input_256_1'))
		{
			doUpdate = YES
		}
		$(".input_257_1").val(input_257_1)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_270_1,.input_272_1'))
		{
			doUpdate = YES
		}
		$(".input_273_1").val(input_273_1)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_255_1,.input_256_1,.input_260_1,.input_261_1,.input_270_1,.input_272_1'))
		{
			doUpdate = YES
		}
		$(".input_274_1").val(input_274_1)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_255_1,.input_256_1,.input_260_1,.input_261_1,.input_270_1,.input_272_1'))
		{
			doUpdate = YES
		}
		$(".input_276_1").val(input_276_1)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_270_1,.input_272_1,.input_261_1'))
		{
			doUpdate = YES
		}
		$(".input_271_1").val(input_271_1)	.updateTextbox(doUpdate);
	}
	
	{
		input_255_2 = parseFloat($(".input_255_2").val()) || 0;
		input_256_2 = parseFloat($(".input_256_2").val()) || 0;
		input_256_2 = parseFloat($(".input_256_2").val()) || 0;
		input_260_2 = parseFloat($(".input_260_2").val()) || 0;
		input_261_2 = parseFloat($(".input_261_2").val()) || 0;
		input_270_2 = parseFloat($(".input_270_2").val()) || 0;
		input_272_2 = parseFloat($(".input_272_2").val()) || 0;
		input_257_2 = input_255_2 - (input_255_2 * input_256_2 / 100);
		input_273_2 = input_270_2 * input_272_2 / 100;
		input_271_2 = input_273_2 * input_261_2;
		input_274_2 = input_257_2 - input_271_2;
		input_276_2 = input_274_2 / input_260_2;
		
		doUpdate = NO
		if ($input.is('.input_255_2,.input_256_2'))
		{
			doUpdate = YES
		}
		$(".input_257_2").val(input_257_2)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_270_2,.input_272_2'))
		{
			doUpdate = YES
		}
		$(".input_273_2").val(input_273_2)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_255_2,.input_256_2,.input_260_2,.input_261_2,.input_270_2,.input_272_2'))
		{
			doUpdate = YES
		}
		$(".input_274_2").val(input_274_2)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_255_2,.input_256_2,.input_260_2,.input_261_2,.input_270_2,.input_272_2'))
		{
			doUpdate = YES
		}
		$(".input_276_2").val(input_276_2)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_270_2,.input_272_2,.input_261_2'))
		{
			doUpdate = YES
		}
		$(".input_271_2").val(input_271_2)	.updateTextbox(doUpdate);
	}
	
	{
		input_255_3 = parseFloat($(".input_255_3").val()) || 0;
		input_256_3 = parseFloat($(".input_256_3").val()) || 0;
		input_256_3 = parseFloat($(".input_256_3").val()) || 0;
		input_260_3 = parseFloat($(".input_260_3").val()) || 0;
		input_261_3 = parseFloat($(".input_261_3").val()) || 0;
		input_270_3 = parseFloat($(".input_270_3").val()) || 0;
		input_272_3 = parseFloat($(".input_272_3").val()) || 0;
		input_257_3 = input_255_3 - (input_255_3 * input_256_3 / 100);
		input_273_3 = input_270_3 * input_272_3 / 100;
		input_271_3 = input_273_3 * input_261_3;
		input_274_3 = input_257_3 - input_271_3;
		input_276_3 = input_274_3 / input_260_3;

		doUpdate = NO
		if ($input.is('.input_255_3,.input_256_3'))
		{
			doUpdate = YES
		}

		doUpdate = NO
		if ($input.is('.input_270_3,.input_272_3'))
		{
			doUpdate = YES
		}
		$(".input_257_3").val(input_257_3)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_270_3,.input_272_3'))
		{
			doUpdate = YES
		}
		$(".input_273_3").val(input_273_3)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_255_3,.input_256_3,.input_260_3,.input_261_3,.input_270_3,.input_272_3'))
		{
			doUpdate = YES
		}
		$(".input_274_3").val(input_274_3)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_255_3,.input_256_3,.input_260_3,.input_261_3,.input_270_3,.input_272_3'))
		{
			doUpdate = YES
		}
		$(".input_276_3").val(input_276_3)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_270_3,.input_272_3,.input_261_3'))
		{
			doUpdate = YES
		}
		$(".input_271_3").val(input_271_3)	.updateTextbox(doUpdate);
	}

	//Adjustment
	{
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 277) {
			doUpdate = YES;
		}

		input_277_1_0	= parseFloat($(".input_277_1-0").val()) || 0;
		input_277_2_0	= parseFloat($(".input_277_2-0").val()) || 0;
		input_277_3_0	= parseFloat($(".input_277_3-0").val()) || 0;

		input_277_1_2	= input_277_1_0 * input_276_1 / 100;
		input_277_2_2	= input_277_2_0 * input_276_2 / 100;
		input_277_3_2	= input_277_3_0 * input_276_3 / 100;
		input_277_1_3	= input_277_1_2 * input_260_1;
		input_277_2_3	= input_277_2_2 * input_260_2;
		input_277_3_3	= input_277_3_2 * input_260_3;

		$(".input_277_1-2").val(input_277_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_277_2-2").val(input_277_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_277_3-2").val(input_277_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_277_1-3").val(input_277_1_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_277_2-3").val(input_277_2_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_277_3-3").val(input_277_3_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 278)
		{
			doUpdate = YES;
		}

		input_278_1_0	= parseFloat($(".input_278_1-0").val()) || 0;
		input_278_2_0	= parseFloat($(".input_278_2-0").val()) || 0;
		input_278_3_0	= parseFloat($(".input_278_3-0").val()) || 0;		
		input_278_1_2	= input_278_1_0 * input_276_1 / 100;
		input_278_2_2	= input_278_2_0 * input_276_2 / 100;
		input_278_3_2	= input_278_3_0 * input_276_3 / 100;
		input_278_1_3	= input_278_1_2 * input_260_1;
		input_278_2_3	= input_278_2_2 * input_260_2;
		input_278_3_3	= input_278_3_2 * input_260_3;
		
		$(".input_278_1-2").val(input_278_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_278_2-2").val(input_278_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_278_3-2").val(input_278_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_278_1-3").val(input_278_1_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_278_2-3").val(input_278_2_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_278_3-3").val(input_278_3_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 279)
		{
			doUpdate = YES;
		}

		input_279_1_0	= parseFloat($(".input_279_1-0").val()) || 0;
		input_279_2_0	= parseFloat($(".input_279_2-0").val()) || 0;
		input_279_3_0	= parseFloat($(".input_279_3-0").val()) || 0;
		input_279_1_2	= input_279_1_0 * input_276_1 / 100;
		input_279_2_2	= input_279_2_0 * input_276_2 / 100;
		input_279_3_2	= input_279_3_0 * input_276_3 / 100;
		input_279_1_3	= input_279_1_2 * input_260_1;
		input_279_2_3	= input_279_2_2 * input_260_2;
		input_279_3_3	= input_279_3_2 * input_260_3;
		
		$(".input_279_1-2").val(input_279_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_279_2-2").val(input_279_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_279_3-2").val(input_279_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_279_1-3").val(input_279_1_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_279_2-3").val(input_279_2_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_279_3-3").val(input_279_3_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 280)
		{
			doUpdate = YES;
		}

		input_280_1_0	= parseFloat($(".input_280_1-0").val()) || 0;
		input_280_2_0	= parseFloat($(".input_280_2-0").val()) || 0;
		input_280_3_0	= parseFloat($(".input_280_3-0").val()) || 0;
		input_280_1_2	= input_280_1_0 * input_276_1 / 100;
		input_280_2_2	= input_280_2_0 * input_276_2 / 100;
		input_280_3_2	= input_280_3_0 * input_276_3 / 100;
		input_280_1_3	= input_280_1_2 * input_260_1;
		input_280_2_3	= input_280_2_2 * input_260_2;
		input_280_3_3	= input_280_3_2 * input_260_3;
		
		$(".input_280_1-2").val(input_280_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_280_2-2").val(input_280_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_280_3-2").val(input_280_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_280_1-3").val(input_280_1_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_280_2-3").val(input_280_2_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_280_3-3").val(input_280_3_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 281)
		{
			doUpdate = YES;
		}

		input_281_1_0	= parseFloat($(".input_281_1-0").val()) || 0;
		input_281_2_0	= parseFloat($(".input_281_2-0").val()) || 0;
		input_281_3_0	= parseFloat($(".input_281_3-0").val()) || 0;
		input_281_1_2	= input_281_1_0 * input_276_1 / 100;
		input_281_2_2	= input_281_2_0 * input_276_2 / 100;
		input_281_3_2	= input_281_3_0 * input_276_3 / 100;
		input_281_1_3	= input_281_1_2 * input_260_1;
		input_281_2_3	= input_281_2_2 * input_260_2;
		input_281_3_3	= input_281_3_2 * input_260_3;
		
		$(".input_281_1-2").val(input_281_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_281_2-2").val(input_281_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_281_3-2").val(input_281_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_281_1-3").val(input_281_1_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_281_2-3").val(input_281_2_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_281_3-3").val(input_281_3_3).AdjustmentMinus()	.updateTextbox(doUpdate);

		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 283)
		{
			doUpdate = YES;
		}

		input_283_1_0	= parseFloat($(".input_283_1-0").val()) || 0;
		input_283_2_0	= parseFloat($(".input_283_2-0").val()) || 0;
		input_283_3_0	= parseFloat($(".input_283_3-0").val()) || 0;
		input_283_1_1	= input_283_1_0 * input_276_1 / 100;
		input_283_2_1	= input_283_2_0 * input_276_2 / 100;
		input_283_3_1	= input_283_3_0 * input_276_3 / 100;
		input_283_1_2	= input_283_1_1 * input_260_1;
		input_283_2_2	= input_283_2_1 * input_260_2;
		input_283_3_2	= input_283_3_1 * input_260_3;
		
		$(".input_283_1-1").val(input_283_1_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_283_2-1").val(input_283_2_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_283_3-1").val(input_283_3_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_283_1-2").val(input_283_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_283_2-2").val(input_283_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_283_3-2").val(input_283_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 284)
		{
			doUpdate = YES;
		}

		input_284_1_0	= parseFloat($(".input_284_1-0").val()) || 0;
		input_284_2_0	= parseFloat($(".input_284_2-0").val()) || 0;
		input_284_3_0	= parseFloat($(".input_284_3-0").val()) || 0;
		input_284_1_1	= input_284_1_0 * input_276_1 / 100;
		input_284_2_1	= input_284_2_0 * input_276_2 / 100;
		input_284_3_1	= input_284_3_0 * input_276_3 / 100;
		input_284_1_2	= input_284_1_1 * input_260_1;
		input_284_2_2	= input_284_2_1 * input_260_2;
		input_284_3_2	= input_284_3_1 * input_260_3;
		
		$(".input_284_1-1").val(input_284_1_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_284_2-1").val(input_284_2_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_284_3-1").val(input_284_3_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_284_1-2").val(input_284_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_284_2-2").val(input_284_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_284_3-2").val(input_284_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 285)
		{
			doUpdate = YES;
		}

		input_285_1_0	= parseFloat($(".input_285_1-0").val()) || 0;
		input_285_2_0	= parseFloat($(".input_285_2-0").val()) || 0;
		input_285_3_0	= parseFloat($(".input_285_3-0").val()) || 0;
		input_285_1_2	= input_285_1_0 * input_276_1 / 100;
		input_285_2_2	= input_285_2_0 * input_276_2 / 100;
		input_285_3_2	= input_285_3_0 * input_276_3 / 100;
		input_285_1_3	= input_285_1_2 * input_260_1;
		input_285_2_3	= input_285_2_2 * input_260_2;
		input_285_3_3	= input_285_3_2 * input_260_3;
		
		$(".input_285_1-2").val(input_285_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_285_2-2").val(input_285_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_285_3-2").val(input_285_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_285_1-3").val(input_285_1_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_285_2-3").val(input_285_2_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_285_3-3").val(input_285_3_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 286)
		{
			doUpdate = YES;
		}

		input_286_1_0	= parseFloat($(".input_286_1-0").val()) || 0;
		input_286_2_0	= parseFloat($(".input_286_2-0").val()) || 0;
		input_286_3_0	= parseFloat($(".input_286_3-0").val()) || 0;
		input_286_1_2	= input_286_1_0 * input_276_1 / 100;
		input_286_2_2	= input_286_2_0 * input_276_2 / 100;
		input_286_3_2	= input_286_3_0 * input_276_3 / 100;
		input_286_1_3	= input_286_1_2 * input_260_1;
		input_286_2_3	= input_286_2_2 * input_260_2;
		input_286_3_3	= input_286_3_2 * input_260_3;
		
		$(".input_286_1-2").val(input_286_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_286_2-2").val(input_286_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_286_3-2").val(input_286_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_286_1-3").val(input_286_1_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_286_2-3").val(input_286_2_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_286_3-3").val(input_286_3_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 287)
		{
			doUpdate = YES;
		}

		input_287_1_0	= parseFloat($(".input_287_1-0").val()) || 0;
		input_287_2_0	= parseFloat($(".input_287_2-0").val()) || 0;
		input_287_3_0	= parseFloat($(".input_287_3-0").val()) || 0;
		input_287_1_2	= input_287_1_0 * input_276_1 / 100;
		input_287_2_2	= input_287_2_0 * input_276_2 / 100;
		input_287_3_2	= input_287_3_0 * input_276_3 / 100;
		input_287_1_3	= input_287_1_2 * input_260_1;
		input_287_2_3	= input_287_2_2 * input_260_2;
		input_287_3_3	= input_287_3_2 * input_260_3;
		
		$(".input_287_1-2").val(input_287_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_287_2-2").val(input_287_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_287_3-2").val(input_287_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_287_1-3").val(input_287_1_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_287_2-3").val(input_287_2_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_287_3-3").val(input_287_3_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 288)
		{
			doUpdate = YES;
		}

		input_288_1_0	= parseFloat($(".input_288_1-0").val()) || 0;
		input_288_2_0	= parseFloat($(".input_288_2-0").val()) || 0;
		input_288_3_0	= parseFloat($(".input_288_3-0").val()) || 0;
		input_288_1_1	= input_288_1_0 * input_276_1 / 100;
		input_288_2_1	= input_288_2_0 * input_276_2 / 100;
		input_288_3_1	= input_288_3_0 * input_276_3 / 100;
		input_288_1_2	= input_288_1_1 * input_260_1;
		input_288_2_2	= input_288_2_1 * input_260_2;
		input_288_3_2	= input_288_3_1 * input_260_3;
		
		$(".input_288_1-1").val(input_288_1_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_288_2-1").val(input_288_2_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_288_3-1").val(input_288_3_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_288_1-2").val(input_288_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_288_2-2").val(input_288_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_288_3-2").val(input_288_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
	}

	calculate_tab_pembanding_2(doUpdate , $input);
}

function calculate_tab_pembanding_2(doUpdate = NO, $input)
{
	doUpdate = true;

	if ($input.length===0)
	{
		$input = $("");
		doUpdate = NO;
	}

	var input_289_1_0	= input_277_1_0 + input_278_1_0 + input_279_1_0 + input_280_1_0 + input_281_1_0 + input_283_1_0 + input_284_1_0 + input_285_1_0 + input_286_1_0 + input_287_1_0 + input_288_1_0;
	var input_289_2_0	= input_277_2_0 + input_278_2_0 + input_279_2_0 + input_280_2_0 + input_281_2_0 + input_283_2_0 + input_284_2_0 + input_285_2_0 + input_286_2_0 + input_287_2_0 + input_288_2_0;
	var input_289_3_0	= input_277_3_0 + input_278_3_0 + input_279_3_0 + input_280_3_0 + input_281_3_0 + input_283_3_0 + input_284_3_0 + input_285_3_0 + input_286_3_0 + input_287_3_0 + input_288_3_0;
	
	$(".input_289_1-0").val(input_289_1_0)  .updateTextbox(doUpdate);
	$(".input_289_2-0").val(input_289_2_0)  .updateTextbox(doUpdate);
	$(".input_289_3-0").val(input_289_3_0)	.updateTextbox(doUpdate);
	
	var input_289_1_1	= input_277_1_2 + input_278_1_2 + input_279_1_2 + input_280_1_2 + input_281_1_2 + input_283_1_1 + input_284_1_1 + input_285_1_2 + input_286_1_2 + input_287_1_2 + input_288_1_1;
	var input_289_2_1	= input_277_2_2 + input_278_2_2 + input_279_2_2 + input_280_2_2 + input_281_2_2 + input_283_2_1 + input_284_2_1 + input_285_2_2 + input_286_2_2 + input_287_2_2 + input_288_2_1;
	var input_289_3_1	= input_277_3_2 + input_278_3_2 + input_279_3_2 + input_280_3_2 + input_281_3_2 + input_283_3_1 + input_284_3_1 + input_285_3_2 + input_286_3_2 + input_287_3_2 + input_288_3_1;
	
	$(".input_289_1-1").val(input_289_1_1)	.updateTextbox(doUpdate);
	$(".input_289_2-1").val(input_289_2_1)	.updateTextbox(doUpdate);
	$(".input_289_3-1").val(input_289_3_1)	.updateTextbox(doUpdate);
	
	var input_289_1_2	= input_277_1_3 + input_278_1_3 + input_279_1_3 + input_280_1_3 + input_281_1_3 + input_283_1_2 + input_284_1_2 + input_285_1_3 + input_286_1_3 + input_287_1_3 + input_288_1_2;
	var input_289_2_2	= input_277_2_3 + input_278_2_3 + input_279_2_3 + input_280_2_3 + input_281_2_3 + input_283_2_2 + input_284_2_2 + input_285_2_3 + input_286_2_3 + input_287_2_3 + input_288_2_2;
	var input_289_3_2	= input_277_3_3 + input_278_3_3 + input_279_3_3 + input_280_3_3 + input_281_3_3 + input_283_3_2 + input_284_3_2 + input_285_3_3 + input_286_3_3 + input_287_3_3 + input_288_3_1;
	
	$(".input_289_1-2").val(input_289_1_2)	.updateTextbox(doUpdate);
	$(".input_289_2-2").val(input_289_2_2)	.updateTextbox(doUpdate);
	$(".input_289_3-2").val(input_289_3_2)	.updateTextbox(doUpdate);
	
	var input_290_1		= input_276_1 * (1 + (input_289_1_0 / 100));
	var input_290_2		= input_276_2 * (1 + (input_289_2_0 / 100));
	var input_290_3		= input_276_3 * (1 + (input_289_3_0 / 100));
	
	// doUpdate=true;
	$(".input_290_1").val(input_290_1)	.updateTextbox(doUpdate);
	$(".input_290_2").val(input_290_2)	.updateTextbox(doUpdate);
	$(".input_290_3").val(input_290_3)	.updateTextbox(doUpdate);
	
	// doUpdate=false;
	cek_deviasi();
	
	{
		var perbedaan_1	=  Math.abs(input_277_1_0) + Math.abs(input_278_1_0) + Math.abs(input_279_1_0) + Math.abs(input_280_1_0) + Math.abs(input_281_1_0) + Math.abs(input_283_1_0) + Math.abs(input_284_1_0) + Math.abs(input_285_1_0) + Math.abs(input_286_1_0) + Math.abs(input_287_1_0) + Math.abs(input_288_1_0);
		var perbedaan_2	=  Math.abs(input_277_2_0) + Math.abs(input_278_2_0) + Math.abs(input_279_2_0) + Math.abs(input_280_2_0) + Math.abs(input_281_2_0) + Math.abs(input_283_2_0) + Math.abs(input_284_2_0) + Math.abs(input_285_2_0) + Math.abs(input_286_2_0) + Math.abs(input_287_2_0) + Math.abs(input_288_2_0);
		var perbedaan_3	=  Math.abs(input_277_3_0) + Math.abs(input_278_3_0) + Math.abs(input_279_3_0) + Math.abs(input_280_3_0) + Math.abs(input_281_3_0) + Math.abs(input_283_3_0) + Math.abs(input_284_3_0) + Math.abs(input_285_3_0) + Math.abs(input_286_3_0) + Math.abs(input_287_3_0) + Math.abs(input_288_3_0);
		
		var jumlah_perbedaan = perbedaan_1 + perbedaan_2 + perbedaan_3;

		var bobot_perbedaan_1 = 0;
		if (perbedaan_1 !== 0 && jumlah_perbedaan !== 0 )
		{
			bobot_perbedaan_1	= perbedaan_1 / jumlah_perbedaan;
		}
		var bobot_perbedaan_2	= 0;
		if (perbedaan_2 !== 0 && jumlah_perbedaan !== 0 )
		{
			bobot_perbedaan_2	= perbedaan_2 / jumlah_perbedaan;
		}
		var bobot_perbedaan_3	= 0;
		if (perbedaan_3 !== 0 && jumlah_perbedaan !== 0 )
		{
			bobot_perbedaan_3	= perbedaan_3 / jumlah_perbedaan;
		}

		var bobot_persamaan_1	= 1 - bobot_perbedaan_1;
		var bobot_persamaan_2	= 1 - bobot_perbedaan_2;
		var bobot_persamaan_3	= 1 - bobot_perbedaan_3;
		var jumlah_persamaan	= bobot_persamaan_1 + bobot_persamaan_2 + bobot_persamaan_3;
		
		var rekonsiliasi_1		= bobot_persamaan_1 / jumlah_persamaan;
		var rekonsiliasi_2		= bobot_persamaan_2 / jumlah_persamaan;
		var rekonsiliasi_3		= bobot_persamaan_3 / jumlah_persamaan;
		
		// doUpdate=true;
		$(".input_291_0").val((rekonsiliasi_1 + rekonsiliasi_2 + rekonsiliasi_3) * 100)	.updateTextbox(doUpdate);
		$(".input_291_1").val(rekonsiliasi_1 * 100) .updateTextbox(doUpdate);
		$(".input_291_2").val(rekonsiliasi_2 * 100) .updateTextbox(doUpdate);
		$(".input_291_3").val(rekonsiliasi_3 * 100) .updateTextbox(doUpdate);
		// doUpdate=false;
		
		var input_292_1	= input_290_1 * rekonsiliasi_1;
		var input_292_2	= input_290_2 * rekonsiliasi_2;
		var input_292_3	= input_290_3 * rekonsiliasi_3;
		var input_292_0 = input_292_1 + input_292_2 + input_292_3;
		
		$(".input_292_0").val(input_292_0).updateTextbox(doUpdate);
		$(".input_292_1").val(input_292_1).updateTextbox(doUpdate);
		$(".input_292_2").val(input_292_2).updateTextbox(doUpdate);
		$(".input_292_3").val(input_292_3).updateTextbox(doUpdate);	
	}
	

	//ORIGINAL
	var input_292_0 		= parseFloat($(".input_292_0").val()) || 0;
	var total_luas_tanah 	= 0;
	var total_nilai_tanah 	= 0;
		
	var i = 1;
	$('#table_data_legalitas_2 > tbody > tr').each(function() {
		var luas_tanah	= 0;
		var bobot		= 0;
		var indikasi	= 0;
		var total_tanah	= 0;
		
		$(this).find('td').each (function()  {
			if ($(this).attr("td-type") == "total"){
				if ($(this).find('input').val() != ""){
					luas_tanah = parseFloat($(this).find('input').val());
				}
			}
			if ($(this).attr("td-type") == "bobot"){
				if ($(this).find('input').val() != ""){
					bobot = parseFloat($(this).find('input').val());
				}
			}
			indikasi	= bobot * input_292_0 / 100;
			if ($(this).attr("td-type") == "indikasi"){
				$(this).find('input').val(indikasi)	.updateTextbox(doUpdate);
			}
				
			total_tanah = indikasi * luas_tanah;
			
			if ($(this).attr("td-type") == "total_nilai_tanah"){
				$(this).find('input').val(total_tanah)	.updateTextbox(doUpdate);
			}
		}); 
			
		total_luas_tanah	= total_luas_tanah + luas_tanah;
		total_nilai_tanah	= total_nilai_tanah + total_tanah;
				
		i++;
	});

	$("#textbox_tanah_71").val(total_nilai_tanah/total_luas_tanah).number( true, 0 )	.updateTextbox(doUpdate);
	$("#textbox_tanah_72").val(total_nilai_tanah).number( true, 0 )	.updateTextbox(doUpdate);
	
	var indikasi_nilai_tanah_setelah_pembulatan	= total_nilai_tanah/total_luas_tanah;
	$("#textbox_pembanding_47").val(indikasi_nilai_tanah_setelah_pembulatan).number( true, 0 )	.updateTextbox();
	$("#textbox_pembanding_48").val(Math.round((indikasi_nilai_tanah_setelah_pembulatan / 10000), 0) * 10000).number( true, 0 )	.updateTextbox(doUpdate);
	
	calculate_tab_pembanding_3(doUpdate , $input);
}
function calculate_tab_pembanding_3(doUpdate = NO, $input)
{
	// doUpdate = NO;
	var role = "entry"
	if (getUrlParameter("role"))
	{
		role = getUrlParameter("role");
	}
	var tanah_luas = parseFloat($('#'+role).find("#textbox_tanah_61").val()) || 0
	
	var tanah_harga			= parseFloat($("#textbox_pembanding_48").val()) || 0;
	
	var carpot_jumlah		= parseFloat($("#textbox_sarana_2").val()) || 0;
	var carpot_harga		= parseFloat($("#textbox_sarana_3").val()) || 0;
	
	var perkerasan_jumlah	= parseFloat($("#textbox_sarana_8").val()) || 0;
	var perkerasan_harga	= parseFloat($("#textbox_sarana_9").val()) || 0;
	
	var pagar_jumlah		= parseFloat($("#textbox_sarana_14").val()) || 0;
	var pagar_harga			= parseFloat($("#textbox_sarana_15").val()) || 0;
	
	var halaman_jumlah		= parseFloat($("#textbox_sarana_20").val()) || 0;
	var halaman_harga		= parseFloat($("#textbox_sarana_21").val()) || 0;
	
	var gapura_jumlah		= parseFloat($("#textbox_sarana_26").val()) || 0;
	var gapura_harga		= parseFloat($("#textbox_sarana_27").val()) || 0;
	
	var taman_jumlah		= parseFloat($("#textbox_sarana_32").val()) || 0;
	var taman_harga			= parseFloat($("#textbox_sarana_33").val()) || 0;
	
	var rcn_tanah			= tanah_luas * tanah_harga;
	var rcn_carpot			= carpot_jumlah * carpot_harga;
	var rcn_perkerasan		= perkerasan_jumlah * perkerasan_harga;
	var rcn_pagar			= pagar_jumlah * pagar_harga;
	var rcn_halaman			= halaman_jumlah * halaman_harga;
	var rcn_gapura			= gapura_jumlah * gapura_harga;
	var rcn_taman			= taman_jumlah * taman_harga;
	
	var total_nilai_pasar	= rcn_tanah + rcn_carpot + rcn_perkerasan + rcn_pagar + rcn_halaman + rcn_gapura + rcn_taman;
	$("#textbox_pembanding_11").val(total_nilai_pasar).hide()	.updateTextbox();
	
	$(".input_274_0").val($("#textbox_pembanding_48").val() * tanah_luas)	.updateTextbox()
	var indikasi = $("#textbox_pembanding_48").val() * tanah_luas;
	$("#textbox_tanah_65").val(indikasi).addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 ).updateTextbox();
	
	var textbox_tanah_66 = indikasi * 80 / 100;
	
	$("#textbox_tanah_66").val(textbox_tanah_66).addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 ) .updateTextbox();

	if (tab_loaded.indexOf('Bangunan_1') !== -1)
	{
		$(".input_270_0").val(data_bangunan["brb_bangunan"]).number( true, 0 ) .updateTextbox();
		$(".input_272_0").val(data_bangunan["kondisi_fisik_bangunan"]).attr("readonly", true) .updateTextbox();
		$(".input_273_0").val(data_bangunan["indikasi_nilai_pasar_m"]).number( true, 0 ) .updateTextbox();
		$(".input_271_0").val(data_bangunan["indikasi_nilai_pasar"]).number( true, 0 ) .updateTextbox();
	}
	
	style_after_ajax_pembanding(doUpdate , $input);
}

function style_after_ajax_pembanding(doUpdate = NO, $input)
{
	doUpdate = NO;
	$(".input_274_0").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
	$(".input_249_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_7").val())	.updateTextbox(doUpdate);
	$(".input_250_0").attr("readonly", true).addClass("readonly");
	$(".input_251_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_8").val())	.updateTextbox(doUpdate);
	$(".input_252_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_2").val())	.updateTextbox(doUpdate);
	$(".input_253_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_18").val())	.updateTextbox(doUpdate);
	$(".input_254_0").attr("readonly", true).addClass("readonly");
	$(".input_255_0").attr("readonly", true).addClass("readonly");
	$(".input_256_0").attr("readonly", true).addClass("readonly");
	$(".input_257_0").attr("readonly", true).addClass("readonly");
	$(".input_270_0").attr("readonly", true).addClass("readonly");
	
	// $(".input_260_0").attr("readonly", true).addClass("readonly").val($("#dbanding").find(".input_162_").val())	.updateTextbox(doUpdate);
	var jumlah_lantai = 0;
	if (typeof txn_bangunan !== 'undefined') {
		luas_bangunan = !txn_bangunan.Bangunan_1 ? 0 : txn_bangunan.Bangunan_1.luas;
		jumlah_lantai = !txn_bangunan.Bangunan_1 ? 0 : txn_bangunan.Bangunan_1.jumlah_lantai;
	}

	// if ($(".input_261_0").val() == "" || $(".input_261_0").val() == "0")
	// {
	// 	$(".input_261_0").val(luas_bangunan).attr("readonly", true).addClass("readonly")	.updateTextbox(doUpdate);
	// }
	// else
	// {
	// 	$(".input_261_0").val(luas_bangunan).attr("readonly", true).addClass("readonly")
	// }

	$(".input_262_0").attr("readonly", true).val("").addClass("readonly")	.updateTextbox(doUpdate);
	$(".input_263_0").attr("readonly", true).addClass("readonly").val($("#textbox_bangunan_134").val())	.updateTextbox(doUpdate);
	
	$(".input_264_0").attr("readonly", true).addClass("readonly").val($("#textbox_tanah_39").val()).updateTextbox(doUpdate);
	$(".input_266_0").attr("readonly", true).addClass("readonly").val($("#textbox_tanah_49").val()).updateTextbox(doUpdate);
	$(".input_268_0").attr("readonly", true).addClass("rea donly").val($("#textbox_tanah_46").val()).updateTextbox(doUpdate);
	$(".input_269_0").attr("readonly", true).addClass("readonly").val($("#textbox_tanah_45").val()).updateTextbox(doUpdate);
	
	var jumlah_pembanding = $("#jumlah_pembanding").val();
	
	for(var i = 0; i <= jumlah_pembanding ; i++)
	{
		$(".input_255_" + i).number( true, 0 );
		$(".input_257_" + i).number( true, 0 );
		// $(".input_260_" + i).number( true, 0 );
		// $(".input_261_" + i).number( true, 0 );
		$(".input_270_" + i).number( true, 0 );
		$(".input_271_" + i).number( true, 0 );
		$(".input_273_" + i).number( true, 0 );
		$(".input_274_" + i).number( true, 0 );
		$(".input_276_" + i).number( true, 0 );
		$(".input_290_" + i).number( true, 0 );
		$(".input_292_" + i).number( true, 0 );
		
		if (i == 0)
		{
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 277)
			{
				doUpdate = YES;
			}
			$(".input_277_" + i).attr("readonly", true).addClass("readonly").val($(".input_253_" + i).val()).updateTextbox(doUpdate);
			
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 278)
			{
				doUpdate = YES;
			}
			$(".input_278_" + i).attr("readonly", true).addClass("readonly").val($(".input_259_" + i).val()).updateTextbox(doUpdate);
			
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 279)
			{
				doUpdate = YES;
			}
			$(".input_279_" + i).attr("readonly", true).addClass("readonly").val($(".input_260_" + i).val()).updateTextbox(doUpdate);
			
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 280)
			{
				doUpdate = YES;
			}
			$(".input_280_" + i).attr("readonly", true).addClass("readonly").val($(".input_264_" + i).val()).updateTextbox(doUpdate);
			
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 281)
			{
				doUpdate = YES;
			}
			$(".input_281_" + i).attr("readonly", true).addClass("readonly").val($(".input_265_" + i).val()).updateTextbox(doUpdate);
			
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 285)
			{
				doUpdate = YES;
			}
			$(".input_285_" + i).attr("readonly", true).addClass("readonly").val($(".input_267_" + i).val()).updateTextbox(doUpdate);
			
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 286)
			{
				doUpdate = YES;
			}
			$(".input_286_" + i).attr("readonly", true).addClass("readonly").val($(".input_269_" + i).val()).updateTextbox(doUpdate);
			
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 287)
			{
				doUpdate = YES;
			}
			$(".input_287_" + i).attr("readonly", true).addClass("readonly").val($(".input_258_" + i).val()).updateTextbox(doUpdate);
		}
		else
		{
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 277)
			{
				doUpdate = YES;
			}
			$(".input_277_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_253_" + i).val()) .updateTextbox(doUpdate);

			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 278)
			{
				doUpdate = YES;
			}
			$(".input_278_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_259_" + i).val()) .updateTextbox(doUpdate);

			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 279)
			{
				doUpdate = YES;
			}
			$(".input_279_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_260_" + i).val()) .updateTextbox(doUpdate);

			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 280)
			{
				doUpdate = YES;
			}
			$(".input_280_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_264_" + i).val()) .updateTextbox(doUpdate);

			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 281)
			{
				doUpdate = YES;
			}
			$(".input_281_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_265_" + i).val()) .updateTextbox(doUpdate);

			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 285)
			{
				doUpdate = YES;
			}
			$(".input_285_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_267_" + i).val()) .updateTextbox(doUpdate);

			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 286)
			{
				doUpdate = YES;
			}
			$(".input_286_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_269_" + i).val()) .updateTextbox(doUpdate);

			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 287)
			{
				doUpdate = YES;
			}
			$(".input_287_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_258_" + i).val()) .updateTextbox(doUpdate);
		}
		
		$(".input_282_" + i).attr("readonly", true).addClass("readonly").val($(".input_266_" + i).val())	.updateTextbox(doUpdate);
		
		$(".input_255_" + i).addClass("text-right");
		$(".input_257_" + i).addClass("text-right").attr("readonly", true).addClass("readonly");
		$(".input_260_" + i).addClass("text-right");
		$(".input_261_" + i).addClass("text-right");
		$(".input_264_" + i).addClass("text-right");
		$(".input_270_" + i).addClass("text-right");
		$(".input_273_" + i).addClass("text-right").attr("readonly", true).addClass("readonly");
		$(".input_271_" + i).addClass("text-right").attr("readonly", true).addClass("readonly");
		$(".input_274_" + i).addClass("text-right").attr("readonly", true).addClass("readonly");
		$(".input_276_" + i).addClass("text-right").attr("readonly", true).addClass("readonly").addClass("bold");
		$(".input_279_" + i + "-1").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );	
		$(".input_280_" + i + "-1").addClass("text-right").attr("readonly", true).addClass("readonly");		
		$(".input_283_" + i + "-1").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_284_" + i + "-1").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_288_" + i + "-1").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_289_" + i + "-1").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_277_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_278_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_279_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_280_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_281_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_283_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_284_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_285_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_286_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_287_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_288_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_289_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_277_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_278_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_279_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_280_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_281_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_283_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_284_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_285_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_286_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_287_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_288_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_289_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );

		$(".input_290_" + i).addClass("text-right").attr("readonly", true).addClass("readonly");
		$(".input_291_" + i).addClass("text-center").attr("readonly", true).addClass("readonly");
		$(".input_292_" + i).addClass("text-right").attr("readonly", true).addClass("readonly");
		// Text Align Center
		$(".input_256_" + i).addClass("text-center");
		$(".input_272_" + i).addClass("text-center").css("background-color", "white");
		
		$(".input_277_" + i + "-0").addClass("text-center");
		$(".input_278_" + i + "-0").addClass("text-center");
		$(".input_279_" + i + "-0").addClass("text-center");
		$(".input_280_" + i + "-0").addClass("text-center");
		$(".input_281_" + i + "-0").addClass("text-center");
		$(".input_283_" + i + "-0").addClass("text-center");
		$(".input_284_" + i + "-0").addClass("text-center");
		$(".input_285_" + i + "-0").addClass("text-center");
		$(".input_286_" + i + "-0").addClass("text-center");
		$(".input_287_" + i + "-0").addClass("text-center");
		$(".input_288_" + i + "-0").addClass("text-center");
		$(".input_289_" + i + "-0").addClass("text-center");
	}
	
	var total_data_legalitas = $("#total_data_legalitas").val();
	
	for (var i = 1; i <= total_data_legalitas; i++)
	{
		$(".input_348_" + i).addClass("text-center").number( true, 0 );
		$(".input_349_" + i).addClass("text-right").number( true, 0 );
		$(".input_350_" + i).addClass("text-right").number( true, 0 );
	}
}

function update_sarana_pelengkap(doUpdate = DONT, $input){
	if (!$input)
	{
		doUpdate = DONT;
		$input = $(""); //DEFAULT
		// return;
	}

	var rcn1 = 0;
	var pasar1 = 0;
	var rcn2 = 0;	
	var pasar2 = 0;
	var rcn3 = 0;	
	var pasar3 = 0;
	var rcn4 = 0;	
	var pasar4 = 0;
	var rcn5 = 0;	
	var pasar5 = 0;
	var rcn6 = 0;	
	var pasar6 = 0;
	var rcn7 = 0;	
	var pasar7 = 0;
	var rcn8 = 0;	
	var pasar8 = 0;
	var rcn9 = 0;	
	var pasar9 = 0;
	var rcn10 = 0;	
	var pasar10 = 0;
	var rcn11 = 0;	
	var pasar11 = 0;
	var rcn12 = 0;	
	var pasar12 = 0;
	var rcn13 = 0;	
	var pasar13 = 0;
	var rcn14 = 0;	
	var pasar14 = 0;
	var rcn15 = 0;	
	var pasar15 = 0;
	var rcn16 = 0;	
	var pasar16 = 0;
	var rcn17 = 0;	
	var pasar17 = 0;
	var rcn18 = 0;	
	var pasar18 = 0;
	var rcn19 = 0;	
	var pasar19 = 0;
	var rcn20 = 0;	
	var pasar20 = 0;

	doUpdate = DONT;
	if ($input.is(".input_672_Bangunan_1,#textbox_sarana_2,#textbox_sarana_4"))
	{
		doUpdate = YES;
	}
	

	{
		$("#textbox_sarana_1") ;

		if ($(".input_672_Bangunan_1").length)
		{
			$("#textbox_sarana_1").val($(".input_672_Bangunan_1").val()) .updateTextbox(doUpdate);
		}

		var daya_listrik	= parseFloat($("#textbox_sarana_1").val()) ? parseFloat($("#textbox_sarana_1").val()) || 0 : 0;
		var satuan1			= parseFloat($("#textbox_sarana_2").val()) ? parseFloat($("#textbox_sarana_2").val()) || 0 : 0;
		var dep1			= parseFloat($("#textbox_sarana_4").val()) ? parseFloat($("#textbox_sarana_4").val()) || 0 : 0;
		
		if (daya_listrik == "Belum terpasang" || daya_listrik == "Tidak ada")
		{
			rcn1 = 0;
		}
		else 
		{
			rcn1 = daya_listrik * satuan1;
		}
		
		pasar1	= rcn1 - (rcn1 * dep1 / 100);
		
		$("#textbox_sarana_2").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_3").val(rcn1).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_5").val(pasar1).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is(".input_673_Bangunan_1,#textbox_sarana_8,#textbox_sarana_10"))
	{
		doUpdate = YES;
	}
	{
		if ($(".input_673_Bangunan_1").length)
		{
			$("#textbox_sarana_6").val($(".input_673_Bangunan_1").val()).updateTextbox(doUpdate);
		}
		else
		{
			$("#textbox_sarana_6");
		}
		
		var jaringan_telepon	= parseFloat($("#textbox_sarana_6").val()) ? parseFloat($("#textbox_sarana_6").val()) || 0 : 0;
		var satuan2				= parseFloat($("#textbox_sarana_8").val()) ? parseFloat($("#textbox_sarana_8").val()) || 0 : 0;
		var dep2				= parseFloat($("#textbox_sarana_10").val()) ? parseFloat($("#textbox_sarana_10").val()) || 0 : 0;
		
		if (jaringan_telepon == "Belum terpasang" || jaringan_telepon == "Tidak ada")
		{
			rcn2 = 0;
		}
		else 
		{
			rcn2 = jaringan_telepon * satuan2;
		}
		
		pasar2	= rcn2 - (rcn2 * dep2 / 100);
		
		$("#textbox_sarana_8").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_9").val(rcn2).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_11").val(pasar2).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is("#textbox_sarana_13,#textbox_sarana_14,#textbox_sarana_16"))
	{
		doUpdate = YES;
	}
	{
		var air_bersih		= parseFloat($("#textbox_sarana_13").val()) ? parseFloat($("#textbox_sarana_13").val()) || 0 : 0;
		var satuan3			= parseFloat($("#textbox_sarana_14").val()) ? parseFloat($("#textbox_sarana_14").val()) || 0 : 0;
		var dep3			= parseFloat($("#textbox_sarana_16").val()) ? parseFloat($("#textbox_sarana_16").val()) || 0 : 0;
		
		rcn3 	= air_bersih * satuan3;
		pasar3	= rcn3 - (rcn3 * dep3 / 100);
		
		$("#textbox_sarana_14").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_15").val(rcn3).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_17").val(pasar3).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is("#textbox_sarana_18,#textbox_sarana_19,#textbox_sarana_21"))
	{
		doUpdate = YES;
	}
	{
		var sumur_bor		= parseFloat($("#textbox_sarana_18").val()) ? parseFloat($("#textbox_sarana_18").val()) || 0 : 0;
		var satuan4			= parseFloat($("#textbox_sarana_19").val()) ? parseFloat($("#textbox_sarana_19").val()) || 0 : 0;
		var dep4			= parseFloat($("#textbox_sarana_21").val()) ? parseFloat($("#textbox_sarana_21").val()) || 0 : 0;
		
		rcn4 	= sumur_bor * satuan4;
		pasar4	= rcn4 - (rcn4 * dep4 / 100);
		
		$("#textbox_sarana_19").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_20").val(rcn4).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_22").val(pasar4).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is("#textbox_sarana_23,#textbox_sarana_24,#textbox_sarana_26"))
	{
		doUpdate = YES;
	}
	{
		var sumur_dalam		= parseFloat($("#textbox_sarana_23").val()) ? parseFloat($("#textbox_sarana_23").val()) || 0 : 0;
		var satuan5			= parseFloat($("#textbox_sarana_24").val()) ? parseFloat($("#textbox_sarana_24").val()) || 0 : 0;
		var dep5			= parseFloat($("#textbox_sarana_26").val()) ? parseFloat($("#textbox_sarana_26").val()) || 0 : 0;
		
		rcn5 	= sumur_dalam * satuan5;
		pasar5	= rcn5 - (rcn5 * dep5 / 100);
		
		$("#textbox_sarana_24").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_25").val(rcn5).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_27").val(pasar5).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is(".input_675_Bangunan_1,.input_676_Bangunan_1,#textbox_sarana_29,#textbox_sarana_30,#textbox_sarana_32"))
	{
		doUpdate = YES;
	}
	{
		if ($(".input_676_Bangunan_1").length)
		{
			$("#textbox_sarana_28").val($(".input_676_Bangunan_1").val()) .updateTextbox(doUpdate);
		}
		else
		{
			$("#textbox_sarana_28") ;
		}
		
		if ($(".input_675_Bangunan_1").length)
		{
			$("#textbox_sarana_29").val($(".input_675_Bangunan_1").val()) .updateTextbox(doUpdate);
		}
		else
		{
			$("#textbox_sarana_29") ;
		}
		
		var ac				= parseFloat($("#textbox_sarana_29").val()) ? parseFloat($("#textbox_sarana_29").val()) || 0 : 0;
		var satuan6			= parseFloat($("#textbox_sarana_30").val()) ? parseFloat($("#textbox_sarana_30").val()) || 0 : 0;
		var dep6			= parseFloat($("#textbox_sarana_32").val()) ? parseFloat($("#textbox_sarana_32").val()) || 0 : 0;
		
		rcn6 	= ac * satuan6;
		pasar6	= rcn6 - (rcn6 * dep6 / 100);
		
		$("#textbox_sarana_30").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_31").val(rcn6).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_33").val(pasar6).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is(".input_683_Bangunan_1,#textbox_sarana_35,#textbox_sarana_36,#textbox_sarana_38"))
	{
		doUpdate = YES;
	}
	{
		if ($(".input_683_Bangunan_1").length)
		{
			$("#textbox_sarana_34").val($(".input_683_Bangunan_1").val()) .updateTextbox(doUpdate);
		}
		else
		{
			$("#textbox_sarana_34") ;
		}
		
		var objek			= parseFloat($("#textbox_sarana_35").val()) ? parseFloat($("#textbox_sarana_35").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_36").val()) ? parseFloat($("#textbox_sarana_36").val()) || 0 : 0;
		var dep7			= parseFloat($("#textbox_sarana_38").val()) ? parseFloat($("#textbox_sarana_38").val()) || 0 : 0;
		
		rcn7 	= objek * satuan;
		pasar7	= rcn7 - (rcn7 * dep7 / 100);
		
		$("#textbox_sarana_36").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_37").val(rcn7).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_39").val(pasar7).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is(".input_672_Bangunan_1,#textbox_sarana_41,#textbox_sarana_42,#textbox_sarana_44"))
	{
		doUpdate = YES;
	}
	{
		var objek			= parseFloat($("#textbox_sarana_41").val()) ? parseFloat($("#textbox_sarana_41").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_42").val()) ? parseFloat($("#textbox_sarana_42").val()) || 0 : 0;
		var dep8			= parseFloat($("#textbox_sarana_44").val()) ? parseFloat($("#textbox_sarana_44").val()) || 0 : 0;
		
		rcn8 	= objek * satuan;
		pasar8	= rcn8 - (rcn8 * dep8 / 100);
		
		$("#textbox_sarana_42").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_43").val(rcn8).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_45").val(pasar8).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is(".input_671_Bangunan_1,#textbox_sarana_47,#textbox_sarana_48,#textbox_sarana_50"))
	{
		doUpdate = YES;
	}
	{
		if ($(".input_671_Bangunan_1").length)
		{
			$("#textbox_sarana_46").val($(".input_671_Bangunan_1").val()) .updateTextbox(doUpdate);
		}
		else
		{
			$("#textbox_sarana_46");
		}
		
		var objek			= parseFloat($("#textbox_sarana_47").val()) ? parseFloat($("#textbox_sarana_47").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_48").val()) ? parseFloat($("#textbox_sarana_48").val()) || 0 : 0;
		var dep9			= parseFloat($("#textbox_sarana_50").val()) ? parseFloat($("#textbox_sarana_50").val()) || 0 : 0;
		
		rcn9 	= objek * satuan;
		pasar9	= rcn9 - (rcn9 * dep9 / 100);
		
		$("#textbox_sarana_48").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_49").val(rcn9).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_51").val(pasar9).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is("#textbox_sarana_53,#textbox_sarana_54,#textbox_sarana_56"))
	{
		doUpdate = YES;
	}
	{
		var objek			= parseFloat($("#textbox_sarana_53").val()) ? parseFloat($("#textbox_sarana_53").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_54").val()) ? parseFloat($("#textbox_sarana_54").val()) || 0 : 0;
		var dep10			= parseFloat($("#textbox_sarana_56").val()) ? parseFloat($("#textbox_sarana_56").val()) || 0 : 0;
		
		rcn10 	= objek * satuan;
		pasar10	= rcn10 - (rcn10 * dep10 / 100);
		
		$("#textbox_sarana_54").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_55").val(rcn10).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_57").val(pasar10).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is(".input_678_Bangunan_1,#textbox_sarana_59,#textbox_sarana_60,#textbox_sarana_62"))
	{
		doUpdate = YES;
	}
	{
		if ($(".input_678_Bangunan_1").length)
		{
			$("#textbox_sarana_58").val($(".input_678_Bangunan_1").val()) .updateTextbox(doUpdate);
		}
		else
		{
			$("#textbox_sarana_58") ;
		}
		
		
		var objek			= parseFloat($("#textbox_sarana_59").val()) ? parseFloat($("#textbox_sarana_59").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_60").val()) ? parseFloat($("#textbox_sarana_60").val()) || 0 : 0;
		var dep11			= parseFloat($("#textbox_sarana_62").val()) ? parseFloat($("#textbox_sarana_62").val()) || 0 : 0;
		
		rcn11 	= objek * satuan;
		pasar11	= rcn11 - (rcn11 * dep11 / 100);
		
		$("#textbox_sarana_60").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_61").val(rcn11).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_63").val(pasar11).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	// 
	doUpdate = DONT;
	if ($input.is(".input_680_Bangunan_1,#textbox_sarana_65,#textbox_sarana_66,#textbox_sarana_68"))
	{
		doUpdate = YES;
	}
	{
		if ($(".input_680_Bangunan_1").length)
		{
			$("#textbox_sarana_64").val($(".input_680_Bangunan_1").val()) .updateTextbox(doUpdate);
		}
		else
		{
			$("#textbox_sarana_64") ;
		}
		
		
		var objek			= parseFloat($("#textbox_sarana_65").val()) ? parseFloat($("#textbox_sarana_65").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_66").val()) ? parseFloat($("#textbox_sarana_66").val()) || 0 : 0;
		var dep12			= parseFloat($("#textbox_sarana_68").val()) ? parseFloat($("#textbox_sarana_68").val()) || 0 : 0;
		
		rcn12 	= objek * satuan;
		pasar12	= rcn12 - (rcn12 * dep12 / 100);
		
		$("#textbox_sarana_66").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_67").val(rcn12)	.attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 ) .updateTextbox(doUpdate);
		$("#textbox_sarana_69").val(pasar12).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is("#textbox_sarana_71,#textbox_sarana_72,#textbox_sarana_74"))
	{
		doUpdate = YES;
	}
	{
		var objek			= parseFloat($("#textbox_sarana_71").val()) ? parseFloat($("#textbox_sarana_71").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_72").val()) ? parseFloat($("#textbox_sarana_72").val()) || 0 : 0;
		var dep13			= parseFloat($("#textbox_sarana_74").val()) ? parseFloat($("#textbox_sarana_74").val()) || 0 : 0;
		
		rcn13 	= objek * satuan;
		pasar13	= rcn13 - (rcn13 * dep13 / 100);
		
		$("#textbox_sarana_72").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_73").val(rcn13).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_75").val(pasar13).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is("#textbox_sarana_77,#textbox_sarana_78,#textbox_sarana_80"))
	{
		doUpdate = YES;
	}
	{
		var objek			= parseFloat($("#textbox_sarana_77").val()) ? parseFloat($("#textbox_sarana_77").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_78").val()) ? parseFloat($("#textbox_sarana_78").val()) || 0 : 0;
		var dep14			= parseFloat($("#textbox_sarana_80").val()) ? parseFloat($("#textbox_sarana_80").val()) || 0 : 0;
		
		rcn14 	= objek * satuan;
		pasar14	= rcn14 - (rcn14 * dep14 / 100);
		
		$("#textbox_sarana_78").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_79").val(rcn14).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_81").val(pasar14).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is(".input_682_Bangunan_1,#textbox_sarana_83,#textbox_sarana_84,#textbox_sarana_86"))
	{
		doUpdate = YES;
	}
	{
		if ($(".input_682_Bangunan_1").length)
		{
			$("#textbox_sarana_82").val($(".input_682_Bangunan_1").val()) .updateTextbox(doUpdate);
		}
		else
		{
			$("#textbox_sarana_82") ;
		}
		
		var objek			= parseFloat($("#textbox_sarana_83").val()) ? parseFloat($("#textbox_sarana_83").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_84").val()) ? parseFloat($("#textbox_sarana_84").val()) || 0 : 0;
		var dep15			= parseFloat($("#textbox_sarana_86").val()) ? parseFloat($("#textbox_sarana_86").val()) || 0 : 0;
		
		rcn15 	= objek * satuan;
		pasar15	= rcn15 - (rcn15 * dep15 / 100);
		
		$("#textbox_sarana_84").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_85").val(rcn15).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_87").val(pasar15).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is("#textbox_sarana_120,#textbox_sarana_121,#textbox_sarana_123"))
	{
		doUpdate = YES;
	}
	{
		var lainnya		= parseFloat($("#textbox_sarana_120").val()) ? parseFloat($("#textbox_sarana_120").val()) || 0 : 0;
		var satuan		= parseFloat($("#textbox_sarana_121").val()) ? parseFloat($("#textbox_sarana_121").val()) || 0 : 0;
		var dep			= parseFloat($("#textbox_sarana_123").val()) ? parseFloat($("#textbox_sarana_123").val()) || 0 : 0;
		
		rcn20 	= lainnya * satuan;
		pasar20	= rcn20 - (rcn20 * dep / 100);
		
		$("#textbox_sarana_121").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_122").val(rcn20).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_124").val(pasar20).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is("#textbox_sarana_91,#textbox_sarana_92,#textbox_sarana_94"))
	{
		doUpdate = YES;
	}
	{
		var objek			= parseFloat($("#textbox_sarana_91").val()) ? parseFloat($("#textbox_sarana_91").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_92").val()) ? parseFloat($("#textbox_sarana_92").val()) || 0 : 0;
		var dep16			= parseFloat($("#textbox_sarana_94").val()) ? parseFloat($("#textbox_sarana_94").val()) || 0 : 0;
		
		rcn16 	= objek * satuan;
		pasar16	= rcn16 - (rcn16 * dep16 / 100);
		
		$("#textbox_sarana_92").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_93").val(rcn16).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_95").val(pasar16).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}

	doUpdate = DONT;
	if ($input.is("#textbox_sarana_97,#textbox_sarana_98,#textbox_sarana_100"))
	{
		doUpdate = YES;
	}
	{
		var objek			= parseFloat($("#textbox_sarana_97").val()) ? parseFloat($("#textbox_sarana_97").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_98").val()) ? parseFloat($("#textbox_sarana_98").val()) || 0 : 0;
		var dep17			= parseFloat($("#textbox_sarana_100").val()) ? parseFloat($("#textbox_sarana_100").val()) || 0 : 0;
		
		rcn17 	= objek * satuan;
		pasar17	= rcn17 - (rcn17 * dep17 / 100);
		
		$("#textbox_sarana_98").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_99").val(rcn17).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_101").val(pasar17).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}

	doUpdate = DONT;
	if ($input.is("#textbox_sarana_103,#textbox_sarana_104,#textbox_sarana_106"))
	{
		doUpdate = YES;
	}
	{
		var objek			= parseFloat($("#textbox_sarana_103").val()) ? parseFloat($("#textbox_sarana_103").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_104").val()) ? parseFloat($("#textbox_sarana_104").val()) || 0 : 0;
		var dep18			= parseFloat($("#textbox_sarana_106").val()) ? parseFloat($("#textbox_sarana_106").val()) || 0 : 0;
		
		rcn18 	= objek * satuan;
		pasar18	= rcn18 - (rcn18 * dep18 / 100);
		
		$("#textbox_sarana_104").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_105").val(rcn18).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_107").val(pasar18).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}

	doUpdate = DONT;
	if ($input.is("#textbox_sarana_109,#textbox_sarana_110,#textbox_sarana_112"))
	{
		doUpdate = YES;
	}
	{
		var objek			= parseFloat($("#textbox_sarana_109").val()) ? parseFloat($("#textbox_sarana_109").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_110").val()) ? parseFloat($("#textbox_sarana_110").val()) || 0 : 0;
		var dep19			= parseFloat($("#textbox_sarana_112").val()) ? parseFloat($("#textbox_sarana_112").val()) || 0 : 0;
		
		rcn19 	= objek * satuan;
		pasar19	= rcn19 - (rcn19 * dep19 / 100);
		
		$("#textbox_sarana_110").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_111").val(rcn19).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_113").val(pasar19).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = YES;
	if ($input.length === 0)
	{
		doUpdate = DONT;
	}

	{
		var total_rcn	= rcn1 + rcn2 + rcn3 + rcn4 + rcn5 + rcn6 + rcn7 + rcn8 + rcn9 + rcn10 + rcn11 + rcn12 + rcn13 + rcn14 + rcn15 + rcn20;
		var total_pasar	= pasar1 + pasar2 + pasar3 + pasar4 + pasar5 + pasar6 + pasar7 + pasar8 + pasar9 + pasar10 + pasar11 + pasar12 + pasar13 + pasar14 + pasar15 + pasar20;
		
		var total_rcn2		= rcn16 + rcn17 + rcn18 + rcn19;
		var total_pasar2	= pasar16 + pasar17 + pasar18 + pasar19;
		
		$("#textbox_sarana_88").val(total_rcn).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_89").val(total_pasar).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 ) .updateTextbox(doUpdate);
		
		$("#textbox_sarana_114").val(total_rcn2).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_115").val(total_pasar2).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		
		$("#textbox_sarana_116").val(total_rcn + total_rcn2).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_117").val(total_pasar + total_pasar2).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}

	$("#textbox_sarana_3,#textbox_sarana_9,#textbox_sarana_15,#textbox_sarana_20,#textbox_sarana_25,#textbox_sarana_31,#textbox_sarana_37,#textbox_sarana_43,#textbox_sarana_49,#textbox_sarana_55,#textbox_sarana_61,#textbox_sarana_67,#textbox_sarana_73,#textbox_sarana_79,#textbox_sarana_85,#textbox_sarana_122,#textbox_sarana_88,#textbox_sarana_93,#textbox_sarana_99,#textbox_sarana_105,#textbox_sarana_111,#textbox_sarana_114,#textbox_sarana_116,#textbox_sarana_5,#textbox_sarana_11,#textbox_sarana_17,#textbox_sarana_22,#textbox_sarana_27,#textbox_sarana_33,#textbox_sarana_45,#textbox_sarana_51,#textbox_sarana_57,#textbox_sarana_63,#textbox_sarana_69,#textbox_sarana_75,#textbox_sarana_81,#textbox_sarana_87,#textbox_sarana_124, #textbox_sarana_89,#textbox_sarana_95,#textbox_sarana_101,#textbox_sarana_107,#textbox_sarana_57,#textbox_sarana_113,#textbox_sarana_115,#textbox_sarana_117").number( true, 0 );
}

function get_data_legalitas(target) {
	var terget_tab	= "";
	if (target == "tanah")
	{
		var terget_tab			= "#table_data_legalitas_1";
		var terget_tab_tbody	= "#tbody_data_legalitas_1";
		var target_url			= base_url + "AjaxPekerjaan/get_data_legalitas/";
		
	}
	else if (target == "dbanding")
	{
		var terget_tab			= "#table_data_legalitas_2";
		var terget_tab_tbody	= "#tbody_data_legalitas_2";
		var target_url			= base_url + "AjaxPekerjaan/get_data_legalitas2/";
	}
	
	$.ajax({
		type		: "POST",
		url 		: target_url,
		dataType	: "json",
		beforeSend: function() {
			$(terget_tab_tbody).html("<tr><td colspan='10' align='center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></td></tr>");
		},
		data		: {
			id_lokasi 	: $("#id_lokasi").val()
		},
		success		: function (data) {
			$(terget_tab_tbody).html("");
			var row = "";
			
			var a = 0;
			$.each(data.data_table, function(i, item) {
				row	= "<tr>";
				
				row	+= "<td align='center'>" + i + "</td>";
				$.each(item, function(j, item1){
					if (j == "tanah_60")
					{
						row	+= "<td td-type='total'>" + item1 + "</td>";
					}
					else if (j == "tanah_68")
					{
						row	+= "<td td-type='bobot'>" + item1 + "</td>";
					}
					else if (j == "tanah_69")
					{
						row	+= "<td td-type='indikasi'>" + item1 + "</td>";
					}
					else if (j == "tanah_70")
					{
						row	+= "<td td-type='total_nilai_tanah'>" + item1 + "</td>";
					}
					else
					{
						row	+= "<td>" + item1 + "</td>";
					}
				});
				
				row	+= "</tr>";
				$(terget_tab_tbody).append(row);
				a++;
			});
			
			$("#total_data_legalitas").val(a);
			$(".default-date-picker").datepicker();

			calculate_total_luas_tanah_data_legalitas(terget_tab);

			if (getUrlParameter("role"))
			{
				role = getUrlParameter("role");
			}
			if (role === 'tanah')
			{
			}
			else if (role === 'dbanding')
			{
				calculate_tab_pembanding(NO)
			}
		}
	})
}

function load_tab_bangunan(role) {
	var jumlah_bangunan	= $("#jumlah_bangunan").val();
	
	for(var i = 1; i < jumlah_bangunan; i++)
	{
		var role_bangunan	= "Bangunan_" + i;
		if (role_bangunan != role)
		{
			$("#tab_" + role_bangunan).html("");
		}
	}

	$(".table_bangunan").find("input").addClass("text-center")

	hitung_luas_fisik_bangunan(role)
	hitung_bct_bangunan(role)
	
	$(".tipe_bangunan").html($("#" + role).find("select#textbox_bangunan_1").val());

	$("#" + role).find("input#textbox_bangunan_60").val($("#" + role).find("select#textbox_bangunan_1").val()).attr("readonly", true).addClass("readonly")	.updateTextbox();

	$(".div-provinsi").html(" - " + $("#textbox_entry_23").val()).css("text-transform", "uppercase");
	

	$(".input_650_" + role_bangunan).number( true, 0 );
	$(".input_654_" + role_bangunan).number( true, 0 );
	$(".input_688_" + role_bangunan).number( true, 0 );

	getKelasBangunan(role);
	getBiayaLangsung(role);
}

function hitung_luas_fisik_bangunan(role, $input)
{
	var doUpdate=true;
	var totalDoUpdate=0;
	if (!$input)
	{
		$input=$("");
	}
	var input_id_field=parseFloat($input.attr("data-id-field")) || 0;

	var luas_total			= 0;
	var luas_pelanggaran	= 0;
	var jumlah_lantai	= $("#" + role).find("input#textbox_bangunan_7").val();

	$("." + role + " tr ").each(function(index){
		var index_tr	= index;
		var td_last	= $(this).find("td").length;

		var luas_tr	= 0;
		var luas_td	= 0;
		
		$(this).find("td").each(function(index){
			var urutan	= index + 1;
			var $luasRuangan=$(this).find("input");

			var td_id_field=parseFloat($luasRuangan.attr("data-id-field")) || 0;
			doUpdate=false;

			if(input_id_field>0 && td_id_field>0 && input_id_field===td_id_field)
			{
				doUpdate=true;
				totalDoUpdate++;
			}

			if (urutan !== td_last)
			{
				luas_td = parseFloat($luasRuangan.val()) || 0;
				luas_tr += luas_td;
			}
			else
			{
				$luasRuangan.val(luas_tr).attr("readonly", true).addClass("readonly") .updateTextbox(doUpdate);
			}
		})
		
		var td_first	= $(this).find("td:first").html();
		
		if (td_first != "" && td_first != undefined)
		{
			if (td_first.indexOf("Lantai") != -1)
			{
				td_first	= td_first.replace("<span>", "");
				td_first	= td_first.replace("</span>", "");
				td_first	= td_first.replace("Lantai ", "");
				
				
				if (td_first > jumlah_lantai + 1)
				{
					luas_pelanggaran = luas_pelanggaran + luas_tr;
				}
			}
			
		}
		
		luas_total = luas_total + luas_tr
	});

	doUpdate=false;

	if (totalDoUpdate>0)
	{
		doUpdate=true;
	}
	$("." + role + ".input_639_" + role).val(luas_total).attr("readonly", true).addClass("readonly") .updateTextbox(doUpdate);
	
	$(".input_261_0").val(luas_total).attr("readonly", true).addClass("readonly")	.updateTextbox(doUpdate);

	
	var tab_role	= role.split("_");
	
	var td_last	= $(".teras_" + tab_role[1] + " tr ").find("td").find("input[id=textbox_bangunan_113]").length;
	var luas		= 0;
	var luas_tmp	= 0;
	
	$(".teras_" + tab_role[1] + " tr ").find("td").find("input[id=textbox_bangunan_113]").each(function(index) 
	{
		var urutan		= index + 1;
		if ($(this).val() == undefined || $(this).val() == "")
		{
			luas_tmp = 0;
		}
		else
		{
			luas_tmp = $(this).val();
		}
		luas = parseFloat(luas_tmp) + luas;
	});

	$(".teras_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_113]").val(luas).attr("readonly", true).addClass("readonly").updateTextbox(totalDoUpdate);

	luas_tmp = luas * 0.5;
	luas_tmp = Math.round(luas_tmp);
	$(".teras_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_129]").val(luas_tmp).attr("readonly", true).addClass("readonly").updateTextbox(totalDoUpdate);
	
	var td_last	= $(".gudang_" + tab_role[1] + " tr ").find("td").find("input[id=textbox_bangunan_127]").length;
	var luas		= 0;
	var luas_tmp	= 0;
	
	$(".gudang_" + tab_role[1] + " tr ").find("td").find("input[id=textbox_bangunan_127]").each(function(index) 
	{
		var urutan		= index + 1;	
		if ($(this).val() == undefined || $(this).val() == "")
		{
			luas_tmp = 0;
		}
		else
		{
			luas_tmp = $(this).val();
		}
		luas = parseFloat(luas_tmp) + luas;
	});

	$(".gudang_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_127]").val(luas).attr("readonly", true).addClass("readonly").updateTextbox(totalDoUpdate);
	
	var td_last	= $(".gudang_" + tab_role[1] + " tr ").find("td").find("input[id=textbox_bangunan_128]").length;
	var luas		= 0;
	var luas_tmp	= 0;
	
	$(".gudang_" + tab_role[1] + " tr ").find("td").find("input[id=textbox_bangunan_128]").each(function(index) 
	{
		var urutan		= index + 1;
		
		if ($(this).val() == undefined || $(this).val() == "")
		{
			luas_tmp = 0;
		}
		else
		{
			luas_tmp = $(this).val();
		}
		luas = parseFloat(luas_tmp) + luas;
	});

	$(".gudang_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_128]").val(luas).attr("readonly", true).addClass("readonly").updateTextbox(totalDoUpdate);

	var td_last	= $(".teras_" + tab_role[1] + " tr ").find("td").find("input[id=textbox_bangunan_114]").length;
	var luas		= 0;
	var luas_tmp	= 0;
	
	$(".teras_" + tab_role[1] + " tr ").find("td").find("input[id=textbox_bangunan_114]").each(function(index) 
	{
		var urutan		= index + 1;
		
		if ($(this).val() == undefined || $(this).val() == "")
		{
			luas_tmp = 0;
		}
		else
		{
			luas_tmp = $(this).val();
		}
		luas = parseFloat(luas_tmp) + luas;
	});

	$(".teras_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_114]").val(luas).attr("readonly", true).addClass("readonly").updateTextbox(totalDoUpdate);

	$("#" + role).find("input[id=textbox_bangunan_92]").val(luas).attr("readonly", true).addClass("readonly").updateTextbox();

	var luas_teras = $("#" + role).find("input#textbox_bangunan_129").val();
	var luas_bangunan = $("#" + role).find("input#textbox_bangunan_5").val();
	var total_ruas_bangunan = parseFloat(luas_bangunan) + parseFloat(luas_teras);

	$("#" + role).find("input#textbox_bangunan_130").val(total_ruas_bangunan).attr("readonly", true).addClass("readonly") .updateTextbox(doUpdate);

	kalkulasiBiaya(role);
}

function hitung_bangunan(el)
{
	var type	= $(el).attr("data-keterangan");
	var id		= $(el).attr("id");
	var value	= $(el).val();
	
	if (id == "textbox_bangunan_26")
	{
		$("#" + type).find("#textbox_bangunan_64").val(value).attr("readonly", true).addClass("readonly")	.updateTextbox();
	}
	else if (id == "textbox_bangunan_27")
	{
		$("#" + type).find("#textbox_bangunan_67").val(value).attr("readonly", true).addClass("readonly")	.updateTextbox();
	}
	else if (id == "textbox_bangunan_28")
	{
		$("#" + type).find("#textbox_bangunan_68").val(value).attr("readonly", true).addClass("readonly")	.updateTextbox();
	}
	else if (id == "textbox_bangunan_29")
	{
		$("#" + type).find("#textbox_bangunan_71").val(value).attr("readonly", true).addClass("readonly")	.updateTextbox();
	}
	else if (id == "textbox_bangunan_30")
	{
		$("#" + type).find("#textbox_bangunan_72").val(value).attr("readonly", true).addClass("readonly")	.updateTextbox();
	}
	else if (id == "textbox_bangunan_31")
	{
		$("#" + type).find("#textbox_bangunan_75").val(value).attr("readonly", true).addClass("readonly")	.updateTextbox();
	}
	else if (id == "textbox_bangunan_34")
	{
		$("#" + type).find("#textbox_bangunan_78").val(value).attr("readonly", true).addClass("readonly")	.updateTextbox();
	}
	else if (id == "textbox_bangunan_35")
	{
		$("#" + type).find("#textbox_bangunan_79").val(value).attr("readonly", true).addClass("readonly")	.updateTextbox();
	}
	
	// get_ringkasan_laporan();
}

function hitung_bct_bangunan(role)
{
	var dteNow = new Date();
	var intYear = dteNow.getFullYear();
	
	$("#" + role).find("input#textbox_bangunan_82").val(intYear).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("input#textbox_bangunan_83").val($("#" + role).find("input#textbox_bangunan_22").val()).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("input#textbox_bangunan_84").val($("#" + role).find("input#textbox_bangunan_23").val()).attr("readonly", true).addClass("readonly")	.updateTextbox();
	
	var kemunduran_fisik		= parseFloat($("#" + role).find("input#textbox_bangunan_99").val()) || 0;	//c93
	var kondisi_terlihat		= parseFloat($("#" + role).find("input#textbox_bangunan_100").val()) || 0;	//k93
	var keusangan_fungsional	= parseFloat($("#" + role).find("input#textbox_bangunan_101").val()) || 0;	//q93
	var keusangan_ekonomis		= parseFloat($("#" + role).find("input#textbox_bangunan_102").val()) || 0;	//x93
	var penyusutan_fisik		= kemunduran_fisik + kondisi_terlihat;

	keusangan_fungsional	= (100 - penyusutan_fisik) * keusangan_fungsional;
	keusangan_ekonomis		= (100 - penyusutan_fisik) * keusangan_ekonomis;
	
	// var total_penyusutan	= penyusutan_fisik + keusangan_ekonomis + keusangan_fungsional;
	var total_penyusutan	= parseFloat($("#textbox_bangunan_156").val()) || 0;
	
	luas_bangunan		= $("#" + role).find("input#textbox_bangunan_5").val()
	
	$("#" + role).find("input#textbox_bangunan_61").val(luas_bangunan).attr("readonly", true).addClass("readonly")	.updateTextbox();
	
	$("#" + role).find("input#textbox_bangunan_103").val(penyusutan_fisik).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("input#textbox_bangunan_104").val(keusangan_fungsional).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("input#textbox_bangunan_105").val(keusangan_ekonomis).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("input#textbox_bangunan_106").val(total_penyusutan).attr("readonly", true).addClass("readonly")	.updateTextbox();
	
	var luas_imb		= parseFloat($("#" + role).find("input#textbox_bangunan_9").val()) || 0;
	var perbedaan_luas	= luas_bangunan - luas_imb;
	$("#" + role).find("input#textbox_bangunan_10").val(Math.abs(perbedaan_luas)).attr("readonly", true).addClass("readonly")	.updateTextbox();
	
	var a = parseFloat($("#" + role).find("input#textbox_bangunan_16").val()) || 0;
	var b = parseFloat($("#" + role).find("input#textbox_bangunan_17").val()) || 0;
	var c = parseFloat($("#" + role).find("input#textbox_bangunan_18").val()) || 0;
	var d = parseFloat($("#" + role).find("input#textbox_bangunan_19").val()) || 0;
			
	var e = a + b + c + d
	$("#" + role).find("input#textbox_bangunan_20").val(e).attr("readonly", true).addClass("readonly").attr("readonly", true).addClass("readonly")	.updateTextbox();
	
	var data = {
		id_lokasi				: $("#id_lokasi").val(),
		type_bangunan			: $("#" + role).find("select#textbox_bangunan_62").val(),
		luas_bangunan			: luas_bangunan,
		
		ket_pondasi_struktur	: $("#" + role).find("select#textbox_bangunan_65").val(),
		ket_rangka_penutup		: $("#" + role).find("select#textbox_bangunan_69").val(),
		ket_plafond				: $("#" + role).find("select#textbox_bangunan_73").val(),
		ket_dinding_pintu		: $("#" + role).find("select#textbox_bangunan_76").val(),
		ket_lantai_utilitas		: $("#" + role).find("select#textbox_bangunan_80").val(),
		
		teras_luas				: $("#" + role).find("input#textbox_bangunan_88").val(),
		teras_type				: $("#" + role).find("select#textbox_bangunan_89").val(),
		balkon_luas				: $("#" + role).find("input#textbox_bangunan_92").val(),
		balkon_type				: $("#" + role).find("select#textbox_bangunan_93").val(),
		
		tahun_bangun			: $("#" + role).find("input#textbox_bangunan_83").val(),
		tahun_renof				: $("#" + role).find("input#textbox_bangunan_84").val(),
		total_penyusutan		: total_penyusutan
	};
	
	$.ajax({
		type		: "POST",
		url 		: base_url + "AjaxPekerjaan/hitung_bct_bangunan/",
		dataType	: "JSON",
		data		: {
			data : data
		},
		success		: function (data) {
			$("#" + role).find("input#textbox_bangunan_66").val(data.harga_pondasi_struktur).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("input#textbox_bangunan_70").val(data.harga_rangka_penutup).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("input#textbox_bangunan_74").val(data.harga_plafond).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("input#textbox_bangunan_77").val(data.harga_dinding_pintu).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("input#textbox_bangunan_81").val(data.harga_lantai_utilitas).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("input#textbox_bangunan_87").val(data.rcn_bangunan).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			
			
			$("#" + role).find("input#textbox_bangunan_90").val(data.ket_teras).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("input#textbox_bangunan_91").val(data.harga_teras).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("input#textbox_bangunan_94").val(data.ket_balkon).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("input#textbox_bangunan_95").val(data.harga_balkon).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("input#textbox_bangunan_96").val(data.rcn_teras_balkon).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox()
			$("#" + role).find("input#textbox_bangunan_97").val(data.rcn_bangunan2).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("input#textbox_bangunan_98").val(data.pembulatan_rcn).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			
			$("#" + role).find("input#textbox_bangunan_85").val(data.umur_ekonomis).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("input#textbox_bangunan_86").val(data.umur_efektif).attr("readonly", true).addClass("readonly")	.updateTextbox();
			
			
			$("#" + role).find("input#textbox_bangunan_108").val(data.kondisi_bangunan).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("input#textbox_bangunan_109").val(data.rcn_rp).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("input#textbox_bangunan_110").val(data.rcn_rp_m).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("input#textbox_bangunan_111").val(data.nilai_pasar).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("input#textbox_bangunan_112").val(data.nilai_pasar2).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			
			
			// $("#" + role).find("input#textbox_bangunan_55").val(data.nilai_pasar2).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			
			var nilai_pasar_luquidasi	= data.nilai_pasar2 - (data.nilai_pasar2 * 30 / 100);
			
			// $("#" + role).find("input#textbox_bangunan_56").val(nilai_pasar_luquidasi).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly").updateTextbox();
			
			var luas_resmi					= luas_bangunan - e;
			var nilai_resmi_pasar			= data.rcn_rp_m * luas_resmi;
			var nilai_resmi_pasar_luquidasi	= nilai_resmi_pasar - (nilai_resmi_pasar * 30 / 100);
			$("#" + role).find("input#textbox_bangunan_57").val(nilai_resmi_pasar).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly") .updateTextbox();
			$("#" + role).find("input#textbox_bangunan_58").val(nilai_resmi_pasar_luquidasi).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly") .updateTextbox();
			
			
			
			if (role == "Bangunan_1")
			{
				// data_bangunan["brb_bangunan"]				= data.rcn_rp_m;
				// data_bangunan["kondisi_fisik_bangunan"]		= data.kondisi_bangunan_persen;
				// data_bangunan["indikasi_nilai_pasar_m"]		= data.nilai_pasar;
				// data_bangunan["indikasi_nilai_pasar"]		= data.nilai_pasar2;
			}
		}
	});
	
	var pondasi			= $("#" + role).find("select#textbox_bangunan_26").val();
	var struktur		= $("#" + role).find("select#textbox_bangunan_27").val();
	var rangka_atap		= $("#" + role).find("select#textbox_bangunan_28").val();
	var penutup_atap	= $("#" + role).find("select#textbox_bangunan_29").val();
	var plafond			= $("#" + role).find("select#textbox_bangunan_30").val();
	var dinding			= $("#" + role).find("select#textbox_bangunan_31").val();
	var pintu_jendela	= $("#" + role).find("select#textbox_bangunan_34").val();
	var lantai			= $("#" + role).find("select#textbox_bangunan_35").val();
	
	$("#" + role).find("input#textbox_bangunan_64").val(pondasi).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("input#textbox_bangunan_67").val(struktur).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("input#textbox_bangunan_68").val(rangka_atap).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("input#textbox_bangunan_71").val(penutup_atap).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("input#textbox_bangunan_72").val(plafond).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("input#textbox_bangunan_75").val(dinding).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("input#textbox_bangunan_78").val(pintu_jendela).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("input#textbox_bangunan_79").val(lantai).attr("readonly", true).addClass("readonly")	.updateTextbox();
	
	// get_ringkasan_laporan();
}

function get_ringkasan_laporan()
{
	var id_kertas_kerja = $('#id_kertas_kerja').val();
	$.ajax({
		type		: "POST",
		url 		: base_url + "AjaxPekerjaan/get_ringkasan_penilaian?id_kertas_kerja="+id_kertas_kerja,
		beforeSend: function() {
			$("#table_body_ringkasan").html("<tr><td colspan='5' align='center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></td></tr>");
		},
		data		: {
			id_lokasi 	: $("#id_lokasi").val()
		},
		success		: function (data) {
			$("#table_body_ringkasan").html(data);
		},
	});	
}

function get_history_penilaian()
{
	$.ajax({
		type		: "POST",
		url 		: base_url + "AjaxPekerjaan/get_history_penilaian/",
		beforeSend: function() {
			$("#history_penilaian").html("<center><img src='" + base_url + "asset/images/loading.gif' class='loading' align='center' /></center>");
		},
		data		: {
			id_lokasi 	: $("#id_lokasi").val()
		},
		success		: function (data) {
			$("#history_penilaian").html(data);
		},
	});
}

function cek_deviasi()
{
	var input_290_1 = parseFloat($(".input_290_1").val()) || 0;
	var input_290_2 = parseFloat($(".input_290_2").val()) || 0;
	var input_290_3 = parseFloat($(".input_290_3").val()) || 0;
	var nilai_indikasi_tertinggi = Math.max(input_290_1, input_290_2, input_290_3)
	var nilai_indikasi_terendah = Math.min(input_290_1, input_290_2, input_290_3)
	var deviasi_data = (1-(nilai_indikasi_terendah/nilai_indikasi_tertinggi))*100;
	deviasi_data = deviasi_data.toFixed(2)
	deviasi_data = parseFloat(deviasi_data) || 0
	$(".btn-simpan").hide();
	$("#analisaUlang").hide();
	$('#deviasi_data').val(deviasi_data)
	if (deviasi_data<deviasi_limit)
	{
		$(".btn-simpan").show();
	}
	else
	{
		$("#analisaUlang").show();
	}
}

function calculate_total_luas_tanah_data_legalitas(terget_tab) {
	total_luas_tanah	= 0;

	$(terget_tab + ' > tbody > tr').each(function(){
		$(this).find('td').each (function() {
			if ($(this).attr("td-type") == "total")
			{
				$(this).find('input').addClass("text-right").number( true, 0 );
				if ($(this).find('input').val() != ""){
					total_luas_tanah += parseFloat($(this).find('input').val());
				}
			}
		 	
		}); 
	});
	
	$(terget_tab).find("#textbox_tanah_61").val(total_luas_tanah).number( true, 0 )	.updateTextbox();
	var luasTanahDinilai = total_luas_tanah-(parseFloat($("#textbox_tanah_62").val())||0)
	$("#luas-tanah-dinilai").val(luasTanahDinilai)
}

function setSidebarClick() {
	if (sidebarClicked === 1) {
		var dWidth = $(document).width();
		
		if (dWidth>768) {
			$('.sidebar-toggle').click();
		}
	} else if (sidebarClicked>1) {
		return;
	}

	sidebarClicked++;
}
