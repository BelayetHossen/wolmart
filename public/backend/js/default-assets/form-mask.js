 $(function(){
        'use strict'

        // Credit Card
        var cleaveA = new Cleave('#inputCreditCard', {
          creditCard: true,
          onCreditCardTypeChanged: function (type) {
            console.log(type)
            var card = $('#creditCardType').find('.'+type);

            if(card.length) {
              card.addClass('tx-primary');
              card.siblings().removeClass('tx-primary');
            } else {
              $('#creditCardType span').removeClass('tx-primary');
            }
          }
        });

        // US Format Phone Number
        var cleaveB = new Cleave('#inputPhoneNumber', {
          phone: true,
          phoneRegionCode: 'US'
        });

        // Date Formatting
        var cleaveC = new Cleave('#inputDate', {
          date: true,
          datePattern: ['Y', 'm', 'd']
        });

        var cleaveD = new Cleave('#inputDate2', {
          date: true,
          datePattern: ['m', 'y']
        });

        // Time Formatting
        var cleaveE = new Cleave('#inputTime', {
          time: true,
          timePattern: ['h', 'm', 's']
        });

        var cleaveF = new Cleave('#inputTime2', {
          time: true,
          timePattern: ['h', 'm']
        });

        // Numeral Formatting
        var cleaveG = new Cleave('#inputNumeral', {
          numeral: true,
          numeralThousandsGroupStyle: 'thousand'
        });


        // Blocks Formatting
        var cleaveH = new Cleave('#inputBlocks', {
          blocks: [4, 3, 3, 4],
          uppercase: true
        });

        // Multiple Delimiter
        var cleaveI = new Cleave('#inputBlocks2', {
          delimiters: ['+', '+', '-'],
          blocks: [3, 3, 4, 2]
        });

        // Prefix
        var cleaveJ = new Cleave('#inputBlocks3', {
          prefix: 'Prefix-',
          uppercase: true
        });
      });